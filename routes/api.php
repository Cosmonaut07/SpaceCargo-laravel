<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PackageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'log'], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::group(['middleware' => 'auth:sanctum'], function () {
            Route::get('user', [AuthController::class, 'user']);
        });
    });

    Route::group(['prefix' => 'package', 'middleware' => 'auth:sanctum'], function () {
        Route::post('create', [PackageController::class, 'create']);
        Route::put('update/{id}', [PackageController::class, 'update']);
    });

});

