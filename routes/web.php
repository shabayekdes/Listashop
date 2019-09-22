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

Auth::routes();

Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('admin/{path?}', '\Admin\Http\Controllers\HomeController@index')->name('admin')->where( 'path', '.*' );
    });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');

Route::group([
    // 'middleware' => ['auth:api', 'admin']
    'middleware' => ['auth:api-admin']
    // 'middleware' => ['auth:api-admin', 'admin']
], function () {

    Route::get('/test', function () {

        dd(\Auth::guard('admin')->check());

    });

    Route::namespace('\Admin\Http\Controllers\Api')->prefix('api/admin')->group(function () {



        Route::resource('user', 'UserController');
        Route::resource('category', 'CategoryController');
        Route::apiResource('product', 'ProductController');
    });

    Route::namespace('Product\Http\Controllers')->prefix('api/admin')->group(function () {

        // Route::get('product/show/all', 'ProductController@all');

    });

    Route::namespace('Category\Http\Controllers')->prefix('api/admin')->group(function () {

        Route::get('category/show/all', 'CategoryController@all');

    });

});