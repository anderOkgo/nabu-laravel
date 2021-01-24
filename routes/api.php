<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group
(
    ['prefix' => 'auth'], function ()
        {
            Route::post('login', 'AuthController@login');
            Route::group
            (
                ['middleware' => 'auth:api'], function()
                    {
                        Route::get('logout', 'AuthController@logout');
                        Route::get('user', 'AuthController@user');

                        Route::get('index', 'AuthController@index');
                        Route::get('show/{user}', 'AuthController@show');
                        Route::post('store', 'AuthController@store');
                        Route::put('update/{user}', 'AuthController@update');
                        Route::delete('delete/{user}', 'AuthController@delete');
                    }
            );
        }
);

Route::group
(
    ['prefix' => 'temperature'], function ()
        {
            Route::post('login', 'AuthController@login');
            Route::group
            (
                ['middleware' => 'auth:api'], function()
                    {
                        Route::get('logout', 'AuthController@logout');
                        Route::get('user', 'AuthController@user');

                        Route::get('index', 'TemperatureController@index');
                        Route::get('show/{user}', 'AuthController@show');
                        Route::post('store', 'TemperatureController@store');
                        Route::put('update/{user}', 'AuthController@update');
                        Route::delete('delete/{user}', 'AuthController@delete');
                    }
            );
        }
);

