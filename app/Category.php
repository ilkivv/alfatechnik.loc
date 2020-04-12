<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function getCategoriesItems()
    {
        return $this->where('active', 1)->get();
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
