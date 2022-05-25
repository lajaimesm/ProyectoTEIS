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

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\HomeController@index')->name("layout.admin");
    // Routes admin crud wines
    Route::get('/admin/wines/register', 'App\Http\Controllers\Admin\WineController@register')->name("admin.wines.register");
    Route::post('/admin/wines/upload', 'App\Http\Controllers\Admin\WineController@save')->name("admin.wines.upload");
    Route::get('/admin/wines/list', 'App\Http\Controllers\Admin\WineController@index')->name("admin.wines.list");
    Route::get('/admin/wines/show/{id}', 'App\Http\Controllers\Admin\WineController@show')->name("admin.wines.show");
    Route::get('/admin/wines/delete/{id}', 'App\Http\Controllers\Admin\WineController@destroy')->name('admin.wines.delete');
    Route::get('/admin/wines/update/{id}', 'App\Http\Controllers\Admin\WineController@update')->name("admin.wines.update");
    Route::post('/admin/wines/updated', 'App\Http\Controllers\Admin\WineController@updated')->name("admin.wines.updated");

    // Routes admin crud vasitos
    Route::get('/admin/vasitos/register', 'App\Http\Controllers\Admin\VasitoController@register')->name("admin.vasitos.register");
    Route::post('/admin/vasitos/upload', 'App\Http\Controllers\Admin\VasitoController@save')->name("admin.vasitos.upload");
    Route::get('/admin/vasitos/list', 'App\Http\Controllers\Admin\VasitoController@index')->name("admin.vasitos.list");
    Route::get('/admin/vasitos/show/{id}', 'App\Http\Controllers\Admin\VasitoController@show')->name("admin.vasitos.show");
    Route::get('/admin/vasitos/delete/{id}', 'App\Http\Controllers\Admin\VasitoController@destroy')->name('admin.vasitos.delete');
    Route::get('/admin/vasitos/update/{id}', 'App\Http\Controllers\Admin\VasitoController@update')->name("admin.vasitos.update");
    Route::post('/admin/vasitos/updated', 'App\Http\Controllers\Admin\VasitoController@updated')->name("admin.vasitos.updated");

    //Routes admin crud combos

    Route::get('/admin/combos/register', 'App\Http\Controllers\Admin\ComboController@register')->name("admin.combos.register");
    Route::post('/admin/combos/upload', 'App\Http\Controllers\Admin\ComboController@save')->name("admin.combos.upload");
    Route::get('/admin/combos/list', 'App\Http\Controllers\Admin\ComboController@index')->name("admin.combos.list");
    Route::get('/admin/combos/show/{id}', 'App\Http\Controllers\Admin\ComboController@show')->name("admin.combos.show");
    Route::get('/admin/combos/delete/{id}', 'App\Http\Controllers\Admin\ComboController@destroy')->name('admin.combos.delete');
    Route::get('/admin/combos/update/{id}', 'App\Http\Controllers\Admin\ComboController@update')->name("admin.combos.update");
    Route::post('/admin/combos/updated', 'App\Http\Controllers\Admin\ComboController@updated')->name("admin.combos.updated");

});
Auth::routes();
// Routes vasitos
Route::get('/vasitos/list', 'App\Http\Controllers\User\VasitoController@index')->name("vasitos.list");
Route::get('/vasitos/lowPrice', 'App\Http\Controllers\User\VasitoController@vasitoLowPrice')->name("vasitos.lowPrice");
Route::get('/vasitos/searchPriceConsult', 'App\Http\Controllers\User\VasitoController@vasitoSearchPriceConsult')->name("vasitos.searchPriceConsult");
Route::get('/vasitos/searchPrice', 'App\Http\Controllers\User\VasitoController@vasitoSearchPrice')->name("vasitos.searchPrice");
Route::get('/vasitos/show/{id}', 'App\Http\Controllers\User\VasitoController@show')->name("vasitos.show");

// Routes wines
Route::get('/wines/list', 'App\Http\Controllers\User\WineController@index')->name("wines.list");
Route::get('/wines/nameSearchConsult', 'App\Http\Controllers\User\WineController@wineNameSearchConsult')->name("wines.nameSearchConsult");
Route::get('/wines/nameSearch', 'App\Http\Controllers\User\WineController@wineNameSearch')->name("wines.nameSearch");
Route::get('/wines/highDiscount', 'App\Http\Controllers\User\WineController@wineHighDiscount')->name("wines.highDiscount");
Route::get('/wines/show/{id}', 'App\Http\Controllers\User\WineController@show')->name("wines.show");

//Routes combos

Route::get('/combos/list', 'App\Http\Controllers\User\ComboController@index')->name("combos.list");
Route::get('/combos/show/{id}', 'App\Http\Controllers\User\ComboController@show')->name("combos.show");

//Routes Cart

Route::get('/cart', 'App\Http\Controllers\User\CartController@index')->name("cart.index");
Route::get('/cart/addVasito/{id}', 'App\Http\Controllers\User\CartController@addVasito')->name("cart.addVasito");
Route::get('/cart/addWine/{id}', 'App\Http\Controllers\User\CartController@addWine')->name("cart.addWine");
Route::get('/cart/addCombo/{id}', 'App\Http\Controllers\User\CartController@addCombo')->name("cart.addCombo");
Route::get('/cart/removeAll/', 'App\Http\Controllers\User\CartController@removeAll')->name("cart.removeAll");
Route::get('/cart/purchase', 'App\Http\Controllers\User\CartController@purchase')->name("cart.purchase");

//Routes Orders
Route::get('/orders/list', 'App\Http\Controllers\User\OrderController@index')->name("orders.list");
Route::get('/orders/show/{id}', 'App\Http\Controllers\User\OrderController@show')->name("orders.show");

//API ROUTES crud
Route::get('/api/vasitos', 'App\Http\Controllers\Api\KappuApi@index')->name("api.Kappu.index");
Route::get('/api/vasitos/{id}', 'App\Http\Controllers\Api\KappuApi@show')->name("api.Kappu.show");
Route::get('/api/v2/vasitos', 'App\Http\Controllers\Api\KappuApiV2@index')->name("api.v2.Kappu.index");
Route::get('/api/v2/vasitos/{id}', 'App\Http\Controllers\Api\KappuApiV2@show')->name("api.v2.Kappu.show");
Route::get('/api/v3/vasitos', 'App\Http\Controllers\Api\KappuApiV3@index')->name("api.v3.Kappu.index");
Route::get('/api/v3/vasitos/{id}', 'App\Http\Controllers\Api\KappuApiV3@paginate')->name("api.v3.Kappu.paginate");

