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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('searches', 'SearchController');

    Route::get('/', ['uses' => 'SearchController@index', 'as' => 'index']);

    Route::get('/searches', ['uses' => 'SearchController@index', 'as' => 'searches']);

    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('/profile', 'UserController@update_user');

    Route::resource('lost-people', 'LostPersonController');
    Route::post('/lost-people/{id}', 'LostPersonController@update');

    Route::get('get-villages-searches-list', 'SearchController@getVillagesSearchesList');
    Route::get('get-villages-practices-list', 'SearchController@getVillagesPracticesList');

    Route::get('/privacy', function () {
        return view('parts.privacy');
    });
    Route::get('/service', function () {
        return view('parts.service');
    });
});

Route::get('locale-ca', function () {
    session(['locale' => 'ca']);

    return back();
});

Route::get('locale-es', function () {
    session(['locale' => 'es']);

    return back();
});

Route::get('locale-en', function () {
    session(['locale' => 'en']);

    return back();
});
