<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ShopController extends Controller
{
    public function __construct()
    {

    }

    public function products()
    {
        return view('shop.products');
    }

    public function product()
    {
        return view('shop.product');
    }
}
