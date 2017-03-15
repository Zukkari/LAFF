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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('lisa', function () {
    if (Auth::check()) {
        return view ('lisa');
    } else {
        return redirect('/');
    }
});


/*
Route::get('postitus', function () {
    return view ('postitus');
});*/

Route::get("postitus", 'postitusController@index');

//Route::get('/lisa', ['as' => 'lisa', 'uses' => 'lisaController@create']);

//Route::post('/lisa', ['as' => '/lisatud', 'uses' => 'lisaController@store']);

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'langController@changeLocale']);

Route::get("lisa", 'lisaController@index');

Route::post("store", "lisaController@store");

Route::get('auth.login', ['as' => 'auth.login']);

Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Auth::routes();
