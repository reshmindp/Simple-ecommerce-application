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
//Route::get('/', 'App\Http\Controllers\LoginController@login_page');
Route::get('/', 'App\Http\Controllers\HomeController@home_page');

Route::group(['prefix'=> 'ecommerce',  'as'=>'ecom.'], function()
{
    Route::get('homepage', 'App\Http\Controllers\HomeController@home_page')->name('homepage');

    Route::post('add-product','App\Http\Controllers\Product\ProductController@add_product')->name('add.product');
    Route::post('update-product','App\Http\Controllers\Product\ProductController@update_product')->name('update.product');
    Route::get('product-page','App\Http\Controllers\Product\ProductController@product_page')->name('product');
    Route::get('product-list','App\Http\Controllers\Product\ProductController@product_list')->name('product.list');
    Route::get('edit-product/{id}','App\Http\Controllers\Product\ProductController@edit_product')->name('edit.product');
    Route::get('delete-product/{id}','App\Http\Controllers\Product\ProductController@delete_product')->name('delete.product');

    Route::get('categories','App\Http\Controllers\Category\CategoryController@category_page')->name('categories');
    Route::post('add-category','App\Http\Controllers\Category\CategoryController@add_category')->name('add.category');
    Route::get('delete-category/{id}','App\Http\Controllers\Category\CategoryController@delete_category')->name('delete.category');

    Route::get('new-order','App\Http\Controllers\Order\OrderController@new_order_page')->name('new.order');
    Route::get('edit-order/{id}','App\Http\Controllers\Order\OrderController@edit_order')->name('edit.order');
    Route::get('delete-order/{id}','App\Http\Controllers\Order\OrderController@delete_order')->name('delete.order');
    Route::post('update-order','App\Http\Controllers\Order\OrderController@update_order')->name('update.order');


    Route::post('add-order','App\Http\Controllers\Order\OrderController@add_order')->name('add.order');
    Route::get('order-list','App\Http\Controllers\Order\OrderController@order_list')->name('order.list');
    Route::get('invoice/{id}','App\Http\Controllers\Order\OrderController@view_invoice')->name('view.invoice');

    Route::post('add-to-cart','App\Http\Controllers\Order\OrderController@add_to_cart')->name('addto.cart');





});
