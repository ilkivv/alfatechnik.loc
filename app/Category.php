<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
                if (($category['level'] == 2 || $category['level'] == 3 || $category['level'] == 4) && $cat['id'] == $category['parent_id'] && $cat['cleft'] < $category['cleft'] && $cat['cright'] > $category['cright']) {
                    $cat['childrens'][] = $category;
                }
            }
            if (isset($cat['childrens'])) {
                foreach ($cat['childrens'] as &$catchild) {
                    foreach ($arCategories as $category) {
                        if (($category['level'] == 2 || $category['level'] == 3 || $category['level'] == 4) && $cat['id'] == $category['parent_id'] && ($catchild['id'] == $category['parent_id']) && ($catchild['cleft'] < $category['cleft']) && $cat['cright'] > $catchild['cright']) {
                            $catchild['childrens'][] = $category;
                        }
                    }
                    if (isset($catchild['childrens'])) {
                        foreach ($catchild['childrens'] as &$catchildchild) {
                            foreach ($arCategories as $category) {
                                if (($category['level'] == 2 || $category['level'] == 3 || $category['level'] == 4) && $catchildchild['cleft'] < $category['cleft'] && $catchildchild['cright'] > $category['cright']) {
                                    $cat['childrens'][] = $category;
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
        return $this->where('url', $url)->with('products.prices')->first();
    }


    public function addNestedSets($id, $parent_id)
    {
        $parent = $this->select('cleft', 'cright', 'url')->where('id', $parent_id)->first();
        $this->where('cleft', '>=', $parent->cright)->update(['cleft' => $this->raw('cleft + 2')]);
        $this->where('cright', '>=', $parent->cright)->update(['cright' => $this->raw('cright + 2')]);
        $this->where('id', $id)->update(['cleft' => $parent['cright'], 'cright' => ($parent['cright'] + 1)]);
        return $parent;
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
