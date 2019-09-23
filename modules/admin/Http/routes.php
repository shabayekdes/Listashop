<?php

Route::group([
    'middleware' => ['auth:api-admin', 'admin', 'api']
], function () {

    Route::namespace('\Admin\Http\Controllers\Api')->prefix('api/admin')->group(function () {
        Route::resource('user', 'UserController');
        Route::apiResource('category', 'CategoryController');
        Route::apiResource('product', 'ProductController');
    });

});