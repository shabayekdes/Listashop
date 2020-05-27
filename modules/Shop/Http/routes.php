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


Route::namespace('\ListaShop\Shop\Http\Controllers')->group(function () {

    Route::group(['middleware' => 'web'], function () {

        Route::get('/', 'HomeController@index')->name('home');

        Route::get('/store', 'CategoryController@index')->name('store.index');

        Route::get('/store/{product}', 'CategoryController@show')->name('store.show');

        Route::get('/cart', 'CartController@index')->name('cart.index');
        Route::post('/cart/{product}', 'CartController@store')->name('cart.store');

        Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
        Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

        Route::get('/guest-checkout', 'CheckoutController@index')->name('guestCheckout.index');

        Route::get('/my-account', 'UserController@index')->name('myAccount.index')->middleware('auth');

        Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
        Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
    });
});
