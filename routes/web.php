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

});
