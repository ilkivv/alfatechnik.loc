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

Auth::routes();

Route::get('/profile', 'ProfileController@profile')->name('profile');

Route::get('/cart', 'ShopController@cart')->name('cart');

Route::get('/make_order', 'ShopController@makeOrder')->name('make_order');

Route::post('/ajax/make_order', 'Ajax\CartController@makeOrder')->name('ajax_make_order');

Route::get('/wishlist', 'ProfileController@wishlist')->name('wishlist');

Route::post('/ajax/add_product', 'Ajax\CartController@addProduct')->name('add_product');

Route::post('/ajax/destroy_cart', 'Ajax\CartController@destroyCart')->name('destroy_cart');

Route::post('/ajax/delete_product', 'Ajax\CartController@deleteProduct')->name('delete_product');

Route::post('/ajax/quantity_product', 'Ajax\CartController@quantityProduct')->name('quantity_product');