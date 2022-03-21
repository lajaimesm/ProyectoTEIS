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
Route::get('/wines/register', 'App\Http\Controllers\WineController@register')->name("wines.register");
Route::post('/wines/upload', 'App\Http\Controllers\WineController@save')->name("wines.upload");
Route::get('/wines/list', 'App\Http\Controllers\WineController@index')->name("wines.list");
Route::get('/wines/show/{id}', 'App\Http\Controllers\WineController@show')->name("wines.show");
Route::get('/wines/delete/{id}', 'App\Http\Controllers\WineController@destroy')->name('wines.delete');

