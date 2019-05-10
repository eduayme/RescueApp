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
    Route::get('/', function () {
        return view('index');
    });
});
<<<<<<< HEAD

Route::post('/', 'HomeController@index')->name('index');
=======
>>>>>>> parent of 96157ce... Tests login and resetPaswword working
