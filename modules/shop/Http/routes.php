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

    Route::get('/', 'ShopController@index')->defaults('_config', [
        'view' => 'shop::home.index'
    ]);
});
Route::namespace('Category\Http\Controllers')->group(function(){

    Route::get('/category', 'CategoryController@index')->defaults('_config', [
        'view' => 'shop::category.index'
    ]);
});
