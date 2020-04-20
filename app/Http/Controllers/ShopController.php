<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ShopController extends Controller
{
    public function __construct()
    {

    }

    public function products(Category $categoryModel, Request $request)
    {
        $url = $request->path();
        $category = $categoryModel->getProductsItems($url);
        $category['count'] = 100/*count($category['products'])*/;
        //dd($category);
        return view('shop.products', ['category' => $category['category'], 'categories' => $category['categories']]);
    }

    public function product($id, Product $productModel)
    {
        $product = $productModel->getProductItem($id);
        return view('shop.product', ['product' => $product]);
    }

    public function cart()
    {
        return view('shop.cart');
    }

    public function makeOrder(Request $request, Delivery $deliveryModel)
    {
        $deliveries = $deliveryModel->getDeliveries();
        return view('shop.make_order', ['deliveries' => $deliveries]);
    }
}
