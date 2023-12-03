<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\UserProgressController;
use App\Http\Controllers\Api\BadgeController;
use App\Http\Controllers\Api\UserBadgeController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {


    Route::group(['middleware'=>['api','api_token']],function(){
        Route::resource('users', UserController::class);


    });


    // User routes

    // Level routes
    Route::resource('levels', LevelController::class);

    // Task routes
    Route::resource('tasks', TaskController::class);

    // User Progress routes
    Route::resource('user-progress', UserProgressController::class);

    // Badge routes
    Route::resource('badges', BadgeController::class);

    // User Badge routes
    Route::resource('user-badges', UserBadgeController::class);
});
