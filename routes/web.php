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

    Route::prefix('manage')->group(function () {
        Route::resource('users', 'UserController');
        Route::get('/users', 'UserController@index')->name('users');
        Route::post('/users', 'UserController@store')->name('add_user');
        Route::post('/users/{id}', 'UserController@update')->name('update_user');
        Route::get('/activities', 'ActivityController@index')->name('activities');
        Route::get('/activities/delete/all', 'ActivityController@deleteAll')->name('activities_delete_all');
    });

    Route::get('/users/{id}', 'UserController@show')->name('view_profile');
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
