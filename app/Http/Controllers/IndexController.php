<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class IndexController extends Controller
{

    public function __construct(Menu $menuApp)
    {
        parent::__construct($menuApp);
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
    public function shop()
    {
        return view('shop.shop');
    }
}
