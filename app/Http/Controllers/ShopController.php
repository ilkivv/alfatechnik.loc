<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Route;

class ShopController extends Controller
{
    public function __construct()
    {

    }

    public function products(Category $categoryModel, Request $request)
    {
        $url = $request->path();
        $category = $categoryModel->getProductsItems($url);
        //print_r($category);die;
        $category->count = count($category->products);
        //$paginator = Paginator::make($items, $totalItems, $perPage);
        return view('shop.products', ['category' => $category]);
    }

    public function product($id, Product $productModel)
    {
        $product = $productModel->getProductItem($id);
        return view('shop.product', ['product' => $product]);
    }
}
