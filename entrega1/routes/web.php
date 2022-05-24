<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/lang/{lang}', 'App\Http\Controllers\HomeController@setLocale');
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

Route::group(['middleware' => ['auth']],function() {
    // Routes admin crud wines
    Route::get('/admin/wines/register', 'App\Http\Controllers\Admin\WineController@register')->name("admin.wines.register");
    Route::post('/admin/wines/upload', 'App\Http\Controllers\Admin\WineController@save')->name("admin.wines.upload");
    Route::get('/admin/wines/list', 'App\Http\Controllers\Admin\WineController@index')->name("admin.wines.list");
    Route::get('/admin/wines/show/{id}', 'App\Http\Controllers\Admin\WineController@show')->name("admin.wines.show");
    Route::get('/admin/wines/nameSearchConsult', 'App\Http\Controllers\Admin\WineController@wineNameSearchConsult')->name("admin.wines.nameSearchConsult");
    Route::get('/admin/wines/highDiscount', 'App\Http\Controllers\Admin\WineController@wineHighDiscount')->name("admin.wines.highDiscount");
    Route::get('/admin/wines/nameSearch', 'App\Http\Controllers\Admin\WineController@wineNameSearch')->name("admin.wines.nameSearch");
    Route::get('/admin/wines/delete/{id}', 'App\Http\Controllers\Admin\WineController@destroy')->name('admin.wines.delete');
    Route::get('/admin/wines/update/{id}', 'App\Http\Controllers\Admin\WineController@update')->name("admin.wines.update");
    Route::post('/admin/wines/updated', 'App\Http\Controllers\Admin\WineController@updated')->name("admin.wines.updated");
    Route::get('/admin/cart', 'App\Http\Controllers\Admin\CartController@index')->name("cart.index_admin");

    // Routes admin crud vasitos
    Route::get('/admin/vasitos/register', 'App\Http\Controllers\Admin\VasitoController@register')->name("admin.vasitos.register");
    Route::post('/admin/vasitos/upload', 'App\Http\Controllers\Admin\VasitoController@save')->name("admin.vasitos.upload");
    Route::get('/admin/vasitos/list', 'App\Http\Controllers\Admin\VasitoController@index')->name("admin.vasitos.list");
    Route::get('/admin/vasitos/show/{id}', 'App\Http\Controllers\Admin\VasitoController@show')->name("admin.vasitos.show");
    Route::get('/admin/vasitos/searchPriceConsult', 'App\Http\Controllers\Admin\VasitoController@vasitoSearchPriceConsult')->name("admin.vasitos.searchPriceConsult");
    Route::get('/admin/vasitos/searchPrice', 'App\Http\Controllers\Admin\VasitoController@vasitoSearchPrice')->name("admin.vasitos.searchPrice");
    Route::get('/admin/vasitos/delete/{id}', 'App\Http\Controllers\Admin\VasitoController@destroy')->name('admin.vasitos.delete');
    Route::get('/admin/vasitos/update/{id}', 'App\Http\Controllers\Admin\VasitoController@update')->name("admin.vasitos.update");
    Route::post('/admin/vasitos/updated', 'App\Http\Controllers\Admin\VasitoController@updated')->name("admin.vasitos.updated");
    Route::get('/admin/vasitos/lowPrice', 'App\Http\Controllers\Admin\VasitoController@vasitoLowPrice')->name("admin.vasitos.lowPrice");
    //Routes Cart

    Route::get('/admin/cart', 'App\Http\Controllers\Admin\CartController@index')->name("admin.cart.index");
    Route::get('/admin/cart/addWine/{id}', 'App\Http\Controllers\Admin\CartController@addWine')->name("admin.cart.addWine");
    Route::get('/admin/cart/addVasito/{id}', 'App\Http\Controllers\Admin\CartController@addVasito')->name("admin.cart.addVasito");
    Route::get('/admin/cart/removeAll/', 'App\Http\Controllers\Admin\CartController@removeAll')->name("admin.cart.removeAll");
    Route::get('/admin/cart/purchase', 'App\Http\Controllers\Admin\CartController@purchase')->name("admin.cart.purchase");
});
Auth::routes();
// Routes vasitos
Route::get('/vasitos/list', 'App\Http\Controllers\VasitoController@index')->name("user_vasitos.list");
Route::get('/vasitos/lowPrice', 'App\Http\Controllers\VasitoController@vasitoLowPrice')->name("vasitos.lowPrice");
Route::get('/vasitos/searchPriceConsult', 'App\Http\Controllers\VasitoController@vasitoSearchPriceConsult')->name("user_vasitos.searchPriceConsult");
Route::get('/vasitos/searchPrice', 'App\Http\Controllers\VasitoController@vasitoSearchPrice')->name("user_vasitos.searchPrice");
Route::get('/vasitos/show/{id}', 'App\Http\Controllers\VasitoController@show')->name("user_vasitos.show");

// Routes wines
Route::get('/wines/list', 'App\Http\Controllers\WineController@index')->name("user_wines.list");
Route::get('/wines/nameSearchConsult', 'App\Http\Controllers\WineController@wineNameSearchConsult')->name("user_wines.nameSearchConsult");
Route::get('/wines/nameSearch', 'App\Http\Controllers\WineController@wineNameSearch')->name("user_wines.nameSearch");
Route::get('/wines/highDiscount', 'App\Http\Controllers\WineController@wineHighDiscount')->name("wines.highDiscount");
Route::get('/wines/show/{id}', 'App\Http\Controllers\WineController@show')->name("user_wines.show");

//Routes Cart

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");
Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");



//API ROUTES crud
Route::get('/api/vasitos', 'App\Http\Controllers\Api\KappuApi@index')->name("api.Kappu.index");
Route::get('/api/vasitos/{id}', 'App\Http\Controllers\Api\KappuApi@show')->name("api.Kappu.show");
Route::get('/api/v2/vasitos', 'App\Http\Controllers\Api\KappuApiV2@index')->name("api.v2.Kappu.index");
Route::get('/api/v2/vasitos/{id}', 'App\Http\Controllers\Api\KappuApiV2@show')->name("api.v2.Kappu.show");
Route::get('/api/v3/vasitos', 'App\Http\Controllers\Api\KappuApiV3@index')->name("api.v3.Kappu.index");
Route::get('/api/v3/vasitos/{id}', 'App\Http\Controllers\Api\KappuApiV3@paginate')->name("api.v3.Kappu.paginate");
