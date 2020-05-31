<?php

Route::group([
    'middleware' => ['web']
], function () {
    Route::namespace('\ListaShop\Shop\Http\Controllers')->group(function () {
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('show.customer.login');
        Route::post('login', 'Auth\LoginController@login')->name('customer.login');

        Route::post('logout', 'Auth\LoginController@logout')->name('customer.logout');

        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('show.customer.register');
        Route::post('register', 'Auth\RegisterController@register')->name('customer.register');
    });
});

Route::namespace('\ListaShop\Shop\Http\Controllers')->group(function () {

    Route::group([
        'middleware' => 'web'
    ], function () {

        Route::get('/', 'HomeController@index')->name('home');

        Route::get('/store', 'CategoryController@index')->name('store.index');

        Route::get('/store/{product}', 'CategoryController@show')->name('store.show');

        Route::get('/cart', 'CartController@index')->name('cart.index');
        Route::post('/cart/{product}', 'CartController@store')->name('cart.store');



        Route::get('/guest-checkout', 'CheckoutController@index')->name('guestCheckout.index');




        Route::group([
            'middleware' => 'auth:customer'
        ], function () {

            Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
            Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

            Route::get('/my-account', 'UserController@index')->name('myAccount.index');

            Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
            Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');

            Route::get('my-address', 'AddressController@index')->name('address.index');
            Route::put('my-address/{address}', 'AddressController@update')->name('address.update');
            Route::post('my-address', 'AddressController@store')->name('address.store');
            Route::delete('my-address/{address}', 'AddressController@destroy')->name('address.destroy');
        });
    });
});
