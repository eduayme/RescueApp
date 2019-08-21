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
    Route::resource('recerques', 'RecerquesController');

    Route::get('/', ['uses' => 'RecerquesController@index', 'as' => 'index']);

    Route::get('/recerques', ['uses' => 'RecerquesController@index', 'as' => 'recerques']);

    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('/profile', 'UserController@update_user');

    Route::resource('desapareguts', 'DesaparegutsController');

    Route::get('/privacy', function () {
        return view('parts.privacy');
    });
    Route::get('/service', function () {
        return view('parts.service');
    });
});
