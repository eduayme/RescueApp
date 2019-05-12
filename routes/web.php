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
    Route::get('/', 'RecerquesController@index')->name('index');

    Route::resource('recerques', 'RecerquesController');

    Route::get('/recerques', 'RecerquesController@index')->name('recerques');
});

Route::get('lang/{lang}', function ($lang) {
    \Session::put('lang', $lang);

    return \Redirect::back();
})->middleware('web')->name('change_lang');
