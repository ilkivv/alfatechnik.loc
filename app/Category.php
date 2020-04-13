<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function getCategoriesItems()
    {
        $arCategories = $this->where('active', 1)->get()->toArray();
        $categories = [];
        foreach ($arCategories as $category){
            if ($category['level'] == 1) {
                $categories[] = $category;
            }
        }

        foreach ($categories as &$cat){
            if ($cat['level'] == 1) {
                foreach ($arCategories as $category) {
                    if ($category['level'] == 2 && $cat['cleft'] < $category['cleft'] && $cat['cright'] > $category['cright']) {
                        $cat['childrens'][] = $category;
                    }
                }
                foreach ($cat['childrens'] as &$children){
                    foreach ($arCategories as $category) {
                        if ($category['level'] == 3 && $children['cleft'] < $category['cleft'] && $children['cright'] > $category['cright']) {
                            $children['childrens'][] = $category;
                        }
                    }
                    unset($children);
                }
            }
            unset($cat);
        }
        return $categories;
    }

    public function getProductsItems($url)
    {
        return $this->where('url', $url)->with('products.prices')->first();
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
