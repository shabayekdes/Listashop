<?php


Route::group([
    'middleware' => ['web']
], function () {
    Route::namespace('\Admin\Http\Controllers')->group(function () {
        Route::get('admin-login', 'Auth\LoginController@showAdminLoginForm')->name('show.admin.login');
        Route::post('admin-login', 'Auth\LoginController@login')->name('admin.login');
    });
});

Route::group([
    'middleware' => ['auth:api-admin', 'admin', 'api']
], function () {
    Route::namespace('\Admin\Http\Controllers')->prefix('api/admin')->group(function () {
        Route::apiResource('user', 'UserController');
        Route::apiResource('category', 'CategoryController');
        Route::apiResource('product', 'ProductController', [
            'only' => ['index', 'show', 'store']
        ]);
        Route::post('product/{id}', 'ProductController@update');
        Route::apiResource('order', 'OrderController');
        Route::apiResource('attribute', 'AttributeController');
        // Route::apiResource('attribute-options', 'AttributeOptionController');
        Route::apiResource('option', 'OptionController');

        Route::post('attribute-options/{id}', 'AttributeController@storeOption');
        Route::put('attribute-options/{option}', 'AttributeController@updateOption');
        Route::delete('attribute-options/{id}', 'AttributeController@destroyOption');
    });
});
