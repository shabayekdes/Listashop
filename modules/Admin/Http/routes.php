<?php


Route::group([
    'middleware' => ['web']
], function () {
    Route::namespace('\ListaShop\Admin\Http\Controllers')->group(function () {
        Route::get('admin-login', 'Auth\LoginController@showAdminLoginForm')->name('show.admin.login');
        Route::post('admin-login', 'Auth\LoginController@login')->name('admin.login');
    });
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::post('admin-logout', '\ListaShop\Admin\Http\Controllers\Auth\LoginController@logout')->name('admin.logout');
});
Route::group([
    'middleware' => ['auth:api-admin', 'admin', 'api']
], function () {
    Route::namespace('\ListaShop\Admin\Http\Controllers')->prefix('api/admin')->group(function () {
        Route::apiResource('customer', 'CustomerController');
        Route::apiResource('category', 'CategoryController');
        Route::apiResource('product', 'ProductController', [
            'except' => ['update']
        ]);
        Route::post('product/{id}', 'ProductController@update');
        Route::apiResource('order', 'OrderController');
        Route::apiResource('attribute', 'AttributeController');
        // Route::apiResource('attribute-options', 'AttributeOptionController');
        Route::apiResource('option', 'OptionController');
        Route::get('setting', 'SettingController@index');
        Route::put('setting', 'SettingController@update');

        Route::post('attribute-options/{id}', 'AttributeController@storeOption');
        Route::put('attribute-options/{option}', 'AttributeController@updateOption');
        Route::delete('attribute-options/{id}', 'AttributeController@destroyOption');

        Route::delete('option-value/{optionValue}', 'OptionValueController@destroy');
        Route::post('option-value', 'OptionValueController@store');

    });
});
