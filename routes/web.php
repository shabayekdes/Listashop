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

Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('admin/{path?}', '\Admin\Http\Controllers\HomeController@index')->name('admin')->where( 'path', '.*' );
    });
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
