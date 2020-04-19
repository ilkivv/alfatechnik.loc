<?php

namespace App\Imports;

use App\Category;
use App\Price;
use App\Product;
use App\Curl;
use App\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class MobaImport implements ToModel
{

    private $file, $url, $path_dir, $provider, $spreadsheet, $current_counter, $last_counter;

    public function __construct()
    {
        $this->url = 'https://moba-opt.ru/files/prices';
        $this->file = '/Price_Moba-Nsk_' . $this->getData() . '.xlsx';
        $this->path_dir = '/files';
        $this->provider = 'Ж';
        $this->current_counter = 0;
        $this->spreadsheet = $this->createXlsxFile();
        $this->category = new Category();
    }

    private function getData()
    {
        return date("d-m-y");
    }

    public function createXlsxFile()
    {
        $reader = new Xlsx();
        $spreadsheet = $reader->load(public_path(). $this->path_dir . $this->file);
        return $spreadsheet;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

    }

    public function parsingMoba($start = 5, $list = 1)
    {
        Curl::getCurlToFile($this->url . $this->file,  $this->path_dir, $this->file);//скачиваем файл
        $makeExcel = $this->makeExcel($this->path_dir, $this->file);//парсим эксель и получаем массив
        $this->clearMemory($makeExcel);
        $excel = array_slice($makeExcel[$list - 1], $start);//обрезаем лишние элементы массива

        $category = null;
        $arParents = false;

        foreach ($excel as $key => $element) {//проходимся по массиву и извлекаем товары и категории
            if ($this->checkProduct($element)) {
                $product = Product::updateOrCreate($this->getItemRefactoring($element, [0 => 'code']), $this->getItemRefactoring($element, [0 => 'code', 1 => 'article', 2 => 'name'], ['category_id' => $category->id, 'active' => 1]));
                $this->updatePrice($product->id, $element);
                $this->checkProvider($product->id, $element, $product);
                $this->clearMemory($product);
            } elseif ($this->checkCategory($element)) {
                $color = $this->getColor('A', $key, $start);
                $this->last_counter = $this->current_counter;
                if ($color === '0000FF' && $this->last_counter != 1) {//родительский элемент
                    $level = 1;
                    $this->current_counter = $level;
                    $arParents = false;
                    $arParents[$level] = 1;
                } elseif ($color === '00CCFF' && $this->last_counter != 2) {
                    $level = 2;
                    $this->current_counter = $level;
                    if ($this->last_counter < $this->current_counter) {
                        $arParents[$level] = $category->id;
                    }
                } elseif ($color === 'C0C0C0' && $this->last_counter != 3) {
                    $level = 3;
                    $this->current_counter = $level;
                    if ($this->last_counter < $this->current_counter) {
                        $arParents[$level] = $category->id;
                    } else {
                        $arParents[$level] = $arParents[$level + 1];
                    }
                } elseif ($color === 'FCFAEB' && $this->last_counter != 4) {
                    $level = 4;
                    $this->current_counter = $level;
                    if ($this->last_counter < $this->current_counter) {
                        $arParents[$level] = $category->id;
                    }
                }
                $category = Category::updateOrCreate(['code' => (Slug::str2url((string)$element[0]) . '-' . (string)$arParents[$level])], $this->getItemRefactoring($element, [0 => 'name'], ['code' => (Slug::str2url((string)$element[0]) . '-' . (string)$arParents[$level]),'level' => $level, 'parent_id'=> $arParents[$level]]));
                if (!$category->cleft && !$category->cright){
                    $parent = $this->category->addNestedSets($category->id, $arParents[$level]);
                    $this->updateUrl($category->id, Slug::str2url((string)$element[0]), $parent->url);
                }
            }
        }
        return true;
    }

    public function makeExcel($path_dir, $path_file)
    {
        return Excel::toArray(new MobaImport(), public_path() . $path_dir . $path_file);
    }

    public function checkProduct($element, $i = 1)
    {
        return (!empty(trim($element[$i]))) ? true : false;
    }

    public function checkCategory($element, $i = 1)
    {
        return (empty(trim($element[$i]))) ? true : false;
    }

    public function getItemRefactoring($element, $columns = false, $custom_columns = false)
    {
        $result = [];
        if ($columns){
            foreach ($columns as $key => $column){
                $result[0][$column] = $element[$key];
            }
        }

        if ($custom_columns){
            foreach ($custom_columns as $key => $column){
                $result[0][$key] = $column;
            }
        }

        return $result[0];
    }

    public function updatePrice($id, $element)
    {
        $this->deletePrice($id);
        $this->insertPrice($id, $element);
    }

    public function updateSlug($id, $slug)
    {
        Category::where('id', $id)->update(['code' => $slug]);
    }

    public function deletePrice($id)
    {
        return Price::where('product_id', $id)->delete();
    }

    public function insertPrice($id, $element)
    {
        return Price::insert([
            [
                'product_id' => $id,
                'price' => $element[3]
            ],
            [
                'product_id' => $id,
                'price' => $element[4]
            ]
        ]);
    }

    public function checkProvider($id, $element, $product)
    {
        $providers = explode(',', $element[5]);
        if (!in_array($this->provider, $providers) && $product['quantity'] < 1){
            Product::where('id', $id)->update(['disallow_order' => 0]);
        }else{
            Product::where('id', $id)->update(['disallow_order' => 1]);
        }
        return $this;
    }

    public function getColor($letter, $number, $start)
    {
        $style = $this->spreadsheet->getSheet(0)->getStyle($letter.(string)((int)$number + (int)$start + (int)1));
        $color = $style->getFill()->getStartColor()->getRGB();
        return $color;
    }

    private function clearMemory($element)
    {
        unset($element);
    }

    public function updateUrl($id, $currentUrl, $parentUrl)
    {
        return Category::where('id', $id)->update(['url' => ($parentUrl . '/' . $currentUrl)]);
    }

}
