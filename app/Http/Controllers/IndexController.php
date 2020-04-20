<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Menu;
use App\Catalog;
use Illuminate\Auth;
use App\Imports\MobaImport;

class IndexController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Главная
     */
    public function index(MobaImport $mobaImportModel, Product $productModel, Category $categoryModel)
    {
        //$mobaImportModel->parsingMoba();die;
        $product_week = $productModel->getProductsWeek();
        $recommended = $productModel->getRecommendedProducts();
        $availability = $productModel->getAvailabilityProducts();
        $best_rating = $productModel->getBestRatingProducts();
        $popular_categories = $categoryModel->getPopularCategories();
        $banner_2 = $productModel->getSuperProductsToBanner();
        $new_arrivals = $productModel->getNewArrivals();
        $random_cat_1 = $categoryModel->getRandomCat();
        $random_cat_2 = $categoryModel->getRandomCat();
        $super_product = $productModel->getSuperProduct();
        $top_20 = $productModel->getTopProducts();
        $best_sellers_random_1 = $categoryModel->getBestSellersCat();
        $best_sellers_random_2 = $categoryModel->getBestSellersCat();
        $trends = $productModel->getTrends();
        $viewed = $productModel->getViewed();

        return view('pages.index',
            [
                'product_week' => $product_week,
                'recommended' => $recommended,
                'availability' => $availability,
                'best_rating' => $best_rating,
                'popular_categories' => $popular_categories,
                'banner_2' => $banner_2,
                'new_arrivals' => $new_arrivals,
                'random_cat_1' => $random_cat_1[0],
                'random_cat_2' => $random_cat_2[0],
                'super_product' => $super_product[0],
                'top_20' => $top_20,
                'best_sellers_random_1' => $best_sellers_random_1[0],
                'best_sellers_random_2' => $best_sellers_random_2[0],
                'trends' => $trends,
                'viewed' => $viewed
            ]);
    }

    /*
     * Страница контактов
     */
    public function contacts()
    {
        return view('pages.contacts');
    }

    /*
     * Каталог
     */
    public function catalog()
    {
        return view('shop.catalog');
    }
}
