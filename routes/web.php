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

    // Task Route

    Route::get('task/create/{search_id}', 'TaskController@create')->name('createTask');

    Route::post('task/post', 'TaskController@store')->name('storeTask');

    Route::post('task', 'TaskController@store')->name('postTask');

    Route::delete('task/{id}', 'TaskController@destroy')->name('deleteTask');

    Route::patch('task/{id}', 'TaskController@update')->name('editTask');
    //

    Route::get('/', ['uses' => 'SearchController@index', 'as' => 'index']);

    Route::get('/searches', ['uses' => 'SearchController@index', 'as' => 'searches']);

    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::post('/profile', 'UserController@update_user');

    Route::resource('lost-people', 'LostPersonController');
    Route::post('/lost-people/{id}', 'LostPersonController@update');

    Route::get('get-villages-searches-list', 'SearchController@getVillagesSearchesList');
    Route::get('get-villages-practices-list', 'SearchController@getVillagesPracticesList');

    Route::resource('actionplan', 'ActionPlanController', ['only' => ['index', 'create', 'store', 'destroy']]);
    Route::post('/actionplan/create/{id}', 'ActionPlanController@create');
    Route::post('/actionplan/update/{id}', 'ActionPlanController@update')->name('actionplan.update');

    Route::resource('todotaskap', 'ToDoTaskAPController');
    Route::post('/todotaskap/{id}', 'ToDoTaskAPController@update')->name('todotask.update');

    Route::resource('incidents', 'IncidentController');

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

    //Permissions and roles
    Route::get('/roles/{user_id}/addrole', 'RoleController@showAssignRole')->name('show_user_role');
    Route::post('/roles/addrole/{user_id}', 'RoleController@storeAssignRole')->name('store_user_role');
    Route::post('/permissions/addpermission/{user_id}', 'PermissionController@storeAssignPermission')->name('store_user_permission');
    Route::resource('/roles', 'RoleController');
    Route::resource('/permissions', 'PermissionController');
});

/* Languages */
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
Route::get('locale-fr', function () {
    session(['locale' => 'fr']);

    return back();
});
Route::get('locale-de', function () {
    session(['locale' => 'de']);
  
    return back();
});
Route::get('locale-pt', function () {
    session(['locale' => 'pt']);
  
    return back();
});