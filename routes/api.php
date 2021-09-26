<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\V1\Auth\AuthController;
use \App\Http\Controllers\Api\V1\UserController;

Route::prefix('v1')->group(function () {

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('get-new-token', [AuthController::class, 'newToken']);

        Route::resource('users', UserController::class)->except(['create', 'store', 'edit']);
    });

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});
