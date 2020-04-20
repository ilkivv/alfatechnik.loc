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

    public function getProductsWeek()
    {
        return $this->active()->category()->price()->get()->random(3);
    }

    public function getRecommendedProducts()
    {
        return $this->active()->price()->get()->random(16);
    }

    public function getAvailabilityProducts()
    {
        return $this->active()->price()->get()->random(16);
    }

    public function getBestRatingProducts()
    {
        return $this->active()->price()->get()->random(16);
    }

    public function getSuperProductsToBanner()
    {
        return $this->active()->category()->price()->get()->random(3);
    }

    public function getNewArrivals()
    {
        return $this->active()->new()->price()->get()->random(16);
    }

    public function getTopProducts()
    {
        return $this->active()->allowed()->price()->get()->random(20);
    }

    public function getTrends()
    {
        return $this->active()->allowed()->price()->get()->random(6);
    }

    public function getViewed()
    {
        return $this->active()->allowed()->price()->get()->random(6);
    }

    public function getSuperProduct()
    {
        return $this->active()->new()->price()->category()->get()->random(1);
    }

    public function prices()
    {
        return $this->hasMany(Price::class)->orderBy('prices.price');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeAllowed($query)
    {
        return $query->where('disallow_order', 0);
    }

    public function scopeDisallowed($query)
    {
        return $query->where('disallow_order', 1);
    }

    public function scopePrice($query)
    {
        return $query->with('prices');
    }

    public function scopeCategory($query)
    {
        return $query->with('category');
    }

    public function scopeNew($query)
    {
        return $query->where('is_new', 1);
    }
}
