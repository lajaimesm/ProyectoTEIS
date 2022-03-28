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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Auth::routes();
Route::get('/admin/wines/register', 'App\Http\Controllers\WineController@register')->name("wines.register");
Route::post('/admin/wines/upload', 'App\Http\Controllers\WineController@save')->name("wines.upload");
Route::get('/admin/wines/list', 'App\Http\Controllers\WineController@index')->name("wines.list");
Route::get('/admin/wines/show/{id}', 'App\Http\Controllers\WineController@show')->name("wines.show");
Route::get('/admin/wines/delete/{id}', 'App\Http\Controllers\WineController@destroy')->name('wines.delete');
Route::get('/wines/list', 'App\Http\Controllers\WineController@index')->name("user.list");
Route::get('/wines/show/{id}', 'App\Http\Controllers\WineController@index')->name("user.show");
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/admin/cart', 'App\Http\Controllers\CartController@index')->name("cart.index_admin");
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");
Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");



