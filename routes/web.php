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

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('admin/{path?}', '\ListaShop\Admin\Http\Controllers\HomeController@index')->name('admin')->where('path', '.*');
    Route::post('admin-logout', '\ListaShop\Admin\Http\Controllers\Auth\LoginController@logout')->name('admin.logout');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index')->name('test');

/**@deprecated v0.4 */
/*Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');

Auth::routes();*/
