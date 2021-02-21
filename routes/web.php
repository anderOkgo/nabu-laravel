<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['verify' => true] );

Route::get('/', 'HomeController@index')->name('home');

Route::resource('usuarios', 'UserController');
Route::resource('roles ', 'RoleController');


Route::get('bikes', 'BikeController@index');
Route::get('bikes/{id}/edit', 'BikeController@edit');
Route::post('bikes/store', 'BikeController@store');
Route::get('bikes/delete/{id}', 'BikeController@destroy');

Route::get('product-list', 'ProductController@index');
Route::get('product-list/{id}/edit', 'ProductController@edit');
Route::post('product-list/store', 'ProductController@store');
Route::get('product-list/delete/{id}', 'ProductController@destroy');

Route::resource('notas/todas', 'NotasController');
Route::get('notas/favoritas', 'NotasController@favoritas');
Route::get('notas/archivadas', 'NotasController@archivadas');