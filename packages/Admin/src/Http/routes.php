<?php

Route::group([
    'middleware' => ['auth:api-admin', 'admin', 'api']
], function () {
    Route::namespace('\Admin\Http\Controllers')->prefix('api/admin')->group(function () {
        Route::apiResource('user', 'UserController');
        Route::apiResource('category', 'CategoryController');
        Route::apiResource('product', 'ProductController');
        Route::apiResource('order', 'OrderController');
        Route::apiResource('attribute', 'AttributeController');
        // Route::apiResource('attribute-options', 'AttributeOptionController');

        Route::post('attribute-options/{id}', 'AttributeController@storeOption');
        Route::put('attribute-options/{option}', 'AttributeController@updateOption');
        Route::delete('attribute-options/{id}', 'AttributeController@destroyOption');
    });
});