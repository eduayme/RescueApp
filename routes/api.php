<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('groups')->group(function () {
    Route::get('', 'GroupController@index')->name('groups.index');
    Route::post('', 'GroupController@store')->name('groups.store');
    Route::post('{group}', 'GroupController@update')->name('groups.update');
    Route::delete('{group}', 'GroupController@destroy')->name('groups.destroy');
});

Route::prefix('leaders')->group(function () {
    Route::get('', 'LeaderController@index')->name('leaders.index');
    Route::post('', 'LeaderController@store')->name('leaders.store');
    Route::post('{leader}', 'LeaderController@update')->name('leaders.update');
    Route::delete('{leader}', 'LeaderController@destroy')->name('leaders.destroy');
});
