<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('lisa', function () {
    return view ('lisa');
});

Route::get('lisa', ['as' => 'lisa', 'uses' => 'lisaController@create']);

Route::post('lisa', ['as' => '/lisa', 'uses' => 'lisaController@store']);



