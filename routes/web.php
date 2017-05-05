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
    Session::put('redirectTo', '/');
    return view('welcome');
});

Route::get('lisa', function () {
    if (Auth::check()) {
        return view ('lisa');
    } else {
        return redirect('/');
    }
});

//Sitemap route
Route::get('sitemap', function (){
    return view('sitemap');
});

Route::get('/meist', function () {
    Session::put('redirectTo', '/meist');
    return view('meist' ,['ns'=>'Niisama']);
});

//Postituste eemaldamine
Route::get('delete/{ad_id}', [
    'uses' => 'postitusController@deleteAd',
    'as' => 'ad.delete',
]);
//Profiilis eemaldamine, peab redirectime profiili!
Route::get('deleteAd/{ad_id}', [
    'uses' => 'postitusController@deleteAdProfile',
    'as' => 'ad.deleteAd',
]);
//Antud route avab meile postituse id järgi
Route::get('/postitus/{id}', [
    'uses' =>'commentsController@index']);

//Kommentaaride lisamine postitusele
Route::post('/createpost/{id}', [
    'uses' => 'commentsController@postCreatePost',
    //'as' => 'post.create/{id}',

]);

//Kommentaaride eemaldamine postitusest
Route::get('/delete-post/{post_id}', [
    'uses' => 'commentsController@getDeletePost',
    'as' => 'post.delete',
    'middleware' => 'auth'
]);

//Peaks kommentaaride muutmine olema, aga pole realiseeritud veel!
Route::post('/edit', [
    'uses' => 'commentsController@updateComment',
]);


Route::get("/search", 'postitusController@search');


//PROFIILIBLOKK

//Kasutaja profiili avamine
Route::get('/profile/{id}', [
        'uses' => 'profileController@index']
);
Route::post("storeImg", "profileController@storeImg");

Route::get('/deleteAdOne', [
    'uses' => 'postitusController@deleteOne',
    'as' => 'deleteOne',
]);

Route::get('/deleteAdAll', [
    'uses' => 'postitusController@deleteAll',
    'as' => 'deleteAll',
]);



//TODO KELLE OMA SEE ON JA MIS VIEW??
Route::get('/voting', function () {
    return view('voting');
});

Route::get('/error', function () {
    return view('error');
});

Route::post('/updatePost', 'postitusController@update');

//VOTING SYSTEM
Route::get('/getVotes', 'VotingController@getRating');
Route::get('/getVoted', 'VotingController@getVotes');
Route::post('/vote', 'VotingController@vote');

Route::get('/profile', 'profileController@index');
Route::get('/getmsg', 'AjaxController@index');

Route::post('/getmsg','postitusController@test');

Route::get("postitus", 'postitusController@index');

Route::get("best", 'postitusController@best');

Route::get("recent", 'postitusController@index');

//Otsing
Route::get("search", 'postitusController@search');

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'langController@changeLocale']);

Route::get("lisa", 'lisaController@index');

Route::post("store", "lisaController@store");

Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


/*
 *  route redirect on selleks, et väljakutsuda facebooki autentimise teenust
 *  route callback annab meile tagasi facebooki vastuse ja sellega saame sellega midagi teha
 */
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Auth::routes();

Route::get('/home', function () {
    Session::put('redirectTo', '/');
    return view('welcome');
});
