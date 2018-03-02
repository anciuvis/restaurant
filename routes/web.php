<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// bando susieti su index metodu sito kontrolerio
Route::get('/', 'HomeController@index')->name('home');

// Product route
//{id} - sitoj vietoj tikisi kintamojo
// Route::get('/product/{id}', 'ProductController@show');
Route::post('/products', 'ProductController@store')->name('products.store')->middleware('auth');
// pakeiciam tik i create metoda, routo metodas irgi Get, ir bus be curly brackets nes konkreciai komanda create
Route::get('/product/create', 'ProductController@create')->name('products.create')->middleware('auth');
//uzkomentuojam virsutini varianta- routus su kintamaisiai dedami i apacia
Route::get('/product/{id}', 'ProductController@show')->name('products.show');
Route::get('/product/{id}/edit', 'ProductController@edit')->name('products.edit')->middleware('auth');
Route::put('/product/{id}', 'ProductController@update')->name('products.update')->middleware('auth');
Route::delete('/product/{id}', 'ProductController@destroy')->name('products.destroy')->middleware('auth');

// Category route
// pasirasius i terminala 'php artisan make:controller CategoryController --resource --model=Category'
// sukuria 7 routus, kuriuos galime panaudoti darant CRUDa:
Route::resource('categories', 'CategoryController');

// Route::get('about', function () {
//     echo 'About';
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
