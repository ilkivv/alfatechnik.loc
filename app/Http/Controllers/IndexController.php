<?php

namespace App\Http\Controllers;

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
    public function index(MobaImport $mobaImportModel)
    {
        $mobaImportModel->parsingMoba();
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
