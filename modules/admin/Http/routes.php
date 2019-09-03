<?php


Route::group([
    // 'middleware' => ['auth:api-admin', 'admin']
], function () {

    Route::namespace('Admin\Http\Controllers\Api')->prefix('api/admin')->group(function () {

        Route::resource('user', 'UserController');
        Route::resource('category', 'CategoryController');

    });

});
