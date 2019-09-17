<?php


Route::group([
    // 'middleware' => ['auth:api-admin', 'admin']
], function () {

    Route::namespace('Admin\Http\Controllers\Api')->prefix('api/admin')->group(function () {

        Route::resource('user', 'UserController');
        Route::resource('category', 'CategoryController');
        Route::resource('product', 'ProductController');
    });

    Route::namespace('Product\Http\Controllers')->prefix('api/admin')->group(function () {

        // Route::get('product/show/all', 'ProductController@all');

    });

    Route::namespace('Category\Http\Controllers')->prefix('api/admin')->group(function () {

        Route::get('category/show/all', 'CategoryController@all');

    });

});
