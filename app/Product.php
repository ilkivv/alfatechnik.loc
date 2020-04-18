<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];

    public function getProductItem($id)
    {
        return $this->where('id', $id)->where('active', 1)->with('prices')->first();
    }

    public function prices()
    {
        return $this->hasMany('App\Price')->orderBy('prices.price');
    }
}
