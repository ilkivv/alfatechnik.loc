<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'IndexController@index')->name('index');

Route::get('/contacts', 'IndexController@contacts')->name('contacts');

Route::get('/catalog', 'IndexController@catalog')->name('catalog');

Route::get('/catalog/{url}', 'ShopController@products')->name('products');

Route::get('/catalog/{url}/{url1}', 'ShopController@products')->name('products');

Route::get('/catalog/{url}/{url1}/{url2}', 'ShopController@products')->name('products');

Route::get('/product/{id}', 'ShopController@product')->name('product');
