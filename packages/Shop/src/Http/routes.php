<?php

/*
|--------------------------------------------------------------------------
| Web Customer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::namespace('Shop\Http\Controllers')->group(function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/store', 'CategoryController@index')->name('shop.index');

    Route::get('/store/{product}', 'CategoryController@show')->name('shop.show');


    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::get('/cart/{product}', 'CartController@store')->name('cart.store');

});