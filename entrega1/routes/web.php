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

// Routes admin crud wines
Route::get('/admin/wines/register', 'App\Http\Controllers\WineController@register')->name("wines.register");
Route::post('/admin/wines/upload', 'App\Http\Controllers\WineController@save')->name("wines.upload");
Route::get('/admin/wines/list', 'App\Http\Controllers\WineController@index')->name("wines.list");
Route::get('/admin/wines/show/{id}', 'App\Http\Controllers\WineController@show')->name("wines.show");
Route::get('/admin/wines/delete/{id}', 'App\Http\Controllers\WineController@destroy')->name('wines.delete');
Route::get('/admin/wines/update/{id}', 'App\Http\Controllers\WineController@update')->name("wines.update");
Route::post('/admin/wines/updated', 'App\Http\Controllers\WineController@updated')->name("wines.updated");
Route::get('/admin/cart', 'App\Http\Controllers\CartController@index')->name("cart.index_admin");

// Routes admin crud vasitos
Route::get('/admin/vasitos/register', 'App\Http\Controllers\VasitoController@register')->name("vasitos.register");
Route::post('/admin/vasitos/upload', 'App\Http\Controllers\VasitoController@save')->name("vasitos.upload");
Route::get('/admin/vasitos/list', 'App\Http\Controllers\VasitoController@index')->name("vasitos.list");
Route::get('/admin/vasitos/show/{id}', 'App\Http\Controllers\VasitoController@show')->name("vasitos.show");
Route::get('/admin/vasitos/delete/{id}', 'App\Http\Controllers\VasitoController@destroy')->name('vasitos.delete');
Route::get('/admin/vasitos/update/{id}', 'App\Http\Controllers\VasitoController@update')->name("vasitos.update");
Route::post('/admin/vasitos/updated', 'App\Http\Controllers\VasitoController@updated')->name("vasitos.updated");

// Routes vasitos
Route::get('/vasitos/list', 'App\Http\Controllers\VasitoController@index')->name("user_vasitos.list");
Route::get('/vasitos/lowPrice', 'App\Http\Controllers\VasitoController@vasitoLowPrice')->name("vasitos.lowPrice");
Route::get('/vasitos/searchPrice', 'App\Http\Controllers\VasitoController@vasitoSearchPrice')->name("vasitos.searchPrice");
Route::get('/vasitos/show/{id}', 'App\Http\Controllers\VasitoController@show')->name("user_vasitos.show");

// Routes wines
Route::get('/wines/list', 'App\Http\Controllers\WineController@index')->name("user_wines.list");
Route::get('/wines/nameSearch', 'App\Http\Controllers\WineController@wineNameSearch')->name("wines.nameSearch");
Route::get('/wines/highDiscount', 'App\Http\Controllers\WineController@wineHighDiscount')->name("wines.highDiscount");
Route::get('/wines/show/{id}', 'App\Http\Controllers\WineController@show')->name("user_wines.show");

//Routes Cart

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");
Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
