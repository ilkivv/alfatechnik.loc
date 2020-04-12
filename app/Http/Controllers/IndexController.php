<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Catalog;

class IndexController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * Главная
     */
    public function index()
    {
        return view('pages.index');
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
