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
    Route::resource('researches', 'ResearchController');

    Route::get('/', ['uses' => 'ResearchController@index', 'as' => 'index']);

    Route::get('/researches', ['uses' => 'ResearchController@index', 'as' => 'researches']);

    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('/profile', 'UserController@update_user');

    Route::resource('lost-people', 'LostPersonController');
    Route::post('/lost-people/{id}', 'LostPersonController@update');

    Route::get('/privacy', function () {
        return view('parts.privacy');
    });
    Route::get('/service', function () {
        return view('parts.service');
    });
});
