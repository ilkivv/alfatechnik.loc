<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];

    public function __construct()
    {

    }

    public function getCategoriesItems()
    {
        $arCategories = $this->where('active', 1)->get()->toArray();
        $categories = [];
        foreach ($arCategories as $category){
            if ($category['level'] == 1) {
                $categories[] = $category;
            }
        }

        foreach ($categories as &$cat) {
            foreach ($arCategories as $category) {
                if (($category['level'] == 2 || $category['level'] == 3 || $category['level'] == 4) && $cat['id'] == $category['parent_id']) {
                    $cat['childrens'][] = $category;
                }
            }
            if (isset($cat['childrens'])) {
                foreach ($cat['childrens'] as &$catchild) {
                    foreach ($arCategories as $category) {
                        if (($category['level'] == 2 || $category['level'] == 3 || $category['level'] == 4) && ($catchild['id'] == $category['parent_id'])) {
                            $catchild['childrens'][] = $category;
                        }
                    }
                    if (isset($catchild['childrens'])) {
                        foreach ($catchild['childrens'] as &$catchildchild) {
                            foreach ($arCategories as $category) {
                                if (($category['level'] == 2 || $category['level'] == 3 || $category['level'] == 4) && $cat['id'] == $category['parent_id']) {
                                    $catchildchild['childrens'][] = $category;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $categories;
    }

    public function getProductsItems($url)
    {
        $category['category'] = $this->where('url', $url)->first();
        $category['categories'] = $this->where('cleft', '>=', $category['category']['cleft'])->where('cright', '<=', $category['category']['cright'])->with('products.prices')->get()->toArray();
        return $category;
    }

    public function addNestedSets($id, $parent_id)
    {
        $parent = $this->select('cleft', 'cright', 'url')->where('id', $parent_id)->first();
        $this->where('cleft', '>=', $parent->cright)->update(['cleft' => $this->raw('cleft + 2')]);
        $this->where('cright', '>=', $parent->cright)->update(['cright' => $this->raw('cright + 2')]);
        $this->where('id', $id)->update(['cleft' => $parent['cright'], 'cright' => ($parent['cright'] + 1)]);
        return $parent;
    }

    public function getPopularCategories()
    {
        return $this->active()->level(2)->get()->random(10);
    }

    public function getRandomCat()
    {
        return $this->active()->level(4)->productprices()->get()->random(1);
    }

    public function getBestSellersCat()
    {
        return $this->active()->level(4)->productprices()->get()->random(1);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function categories()
    {
        return $this->hasMany($this, 'parent_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeLevel($query, $level)
    {
        return $query->where('level', $level);
    }

    public function scopeId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeProductprices($query)
    {
        return $query->with('products.prices');
    }
}
