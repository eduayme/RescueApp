<?php

use App\Http\Controllers\ActionPlanController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\InvolvedPersonController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\LostPersonController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ToDoTaskAPController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    Route::get('/', [SearchController::class, 'index'])->name('index');

    Route::get('/searches', [SearchController::class, 'index'])->name('searches');
    Route::resource('searches', SearchController::class);

    Route::get('task/create/{search_id}', [TaskController::class, 'create'])->name('createTask');
    Route::post('task/post', [TaskController::class, 'store'])->name('storeTask');
    Route::post('task', [TaskController::class, 'store'])->name('postTask');
    Route::delete('task/{id}', [TaskController::class, 'destroy'])->name('deleteTask');
    Route::patch('task/{id}', [TaskController::class, 'update'])->name('editTask');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile', [UserController::class, 'update_user']);

    Route::resource('lost-people', LostPersonController::class);
    Route::post('/lost-people/{id}', [LostPersonController::class, 'update']);

    Route::get('get-villages-searches-list', [SearchController::class, 'getVillagesSearchesList']);
    Route::get('get-villages-practices-list', [SearchController::class, 'getVillagesPracticesList']);

    Route::resource('actionplan', ActionPlanController::class, ['only' => ['index', 'create', 'store', 'destroy']]);
    Route::post('/actionplan/create/{id}', [ActionPlanController::class, 'create']);
    Route::post('/actionplan/update/{id}', [ActionPlanController::class, 'update'])->name('actionplan.update');

    Route::resource('todotaskap', ToDoTaskAPController::class);
    Route::post('/todotaskap/{id}', [ToDoTaskAPController::class, 'update'])->name('todotask.update');

    Route::resource('incidents', IncidentController::class);

    Route::resource('involved_people', InvolvedPersonController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('leaders', LeaderController::class);

    Route::get('/privacy', function () {
        return view('parts.privacy');
    });
    Route::get('/service', function () {
        return view('parts.service');
    });

    Route::prefix('manage')->group(function () {
        Route::resource('users', UserController::class);
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::post('/users', [UserController::class, 'store'])->name('add_user');
        Route::post('/users/{id}', [UserController::class, 'update'])->name('update_user');
        Route::get('/activities', [ActivityController::class, 'index'])->name('activities');
        Route::get('/activities/delete/all', [ActivityController::class, 'deleteAll'])->name('activities_delete_all');
    });

    Route::get('/users/{id}', [UserController::class, 'show'])->name('view_profile');

    // Permissions and roles
    Route::get('/roles/{user_id}/addrole', [RoleController::class, 'showAssignRole'])->name('show_user_role');
    Route::post('/roles/addrole/{user_id}', [RoleController::class, 'storeAssignRole'])->name('store_user_role');
    Route::post('/permissions/addpermission/{user_id}', [PermissionController::class, 'storeAssignPermission'])->name('store_user_permission');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
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
Route::get('locale-it', function () {
    session(['locale' => 'it']);

    return back();
});
