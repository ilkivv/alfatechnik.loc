<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
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
        $category->count = count($category->products);
        return view('shop.products', ['category' => $category]);
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

    public function makeOrder(Request $request, User $userModel)
    {
        $user = $userModel->getUser();
        return view('shop.make_order', ['user' => $user]);
    }
}
