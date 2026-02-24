<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\LeaderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::get('', [GroupController::class, 'index'])->name('groups.index');
    Route::post('', [GroupController::class, 'store'])->name('groups.store');
    Route::post('{group}', [GroupController::class, 'update'])->name('groups.update');
    Route::delete('{group}', [GroupController::class, 'destroy'])->name('groups.destroy');
});

Route::prefix('leaders')->group(function () {
    Route::get('', [LeaderController::class, 'index'])->name('leaders.index');
    Route::post('', [LeaderController::class, 'store'])->name('leaders.store');
    Route::post('{leader}', [LeaderController::class, 'update'])->name('leaders.update');
    Route::delete('{leader}', [LeaderController::class, 'destroy'])->name('leaders.destroy');
});
