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
    Route::get('/', ['uses' => 'RecerquesController@index', 'as' => 'index']);

    Route::resource('recerques', 'RecerquesController');

    Route::get('/recerques', ['uses' => 'RecerquesController@index', 'as' => 'recerques']);
});
