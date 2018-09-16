<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['namespace' => 'Api'],
    function () {
        Route::prefix('users')->group(function () {
            Route::get('/', 'UserController@index');
            Route::post('/', 'UserController@create');
            Route::get('/{id}', 'UserController@show');
            Route::put('/{id}', 'UserController@update');
            Route::delete('/{id}', 'UserController@destroy');
        });

        Route::prefix('groups')->group(function () {
            Route::get('/', 'GroupController@index');
            Route::post('/', 'Group@create');
            Route::put('/{id}', 'Group@update');
        });
    }
);

