<?php


Route::group([
    'middleware' => ['auth:api-admin', 'admin']
], function () {

    Route::namespace('Admin\Http\Controllers')->prefix('admin')->group(function () {

        Route::resource('user', 'UserController');

    });

});
