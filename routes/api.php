<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\BookmarkController;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\PermissionController;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\V1\ThreeDModelController;
use \App\Http\Controllers\Api\V1\UserController;
use \App\Http\Controllers\Api\V1\FileController;
use App\Http\Controllers\Api\V1\ImageController;
use App\Http\Controllers\Api\V1\SkillController;
use App\Http\Controllers\Api\V1\TagController;

Route::prefix('v1')->group(function () {

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('get-new-token', [AuthController::class, 'newToken']);

        Route::resource('users', UserController::class)->except(['create', 'edit']);
        Route::resource('3d-models', ThreeDModelController::class)->except(['create', 'edit'])->parameters(['3d-models' => 'threeDModels']);
        Route::resource('comments', CommentController::class)->except(['create', 'edit']);
        Route::resource('roles', RoleController::class)->except(['create', 'edit']);
        Route::resource('permissions', PermissionController::class)->except(['create', 'edit']);
        Route::resource('bookmarks', BookmarkController::class)->except(['create', 'edit']);
        Route::resource('carts', CartController::class)->except(['create', 'edit']);
        Route::resource('categories', CategoryController::class)->except(['create', 'edit']);
        Route::resource('files', FileController::class)->except(['create', 'edit']);
        Route::resource('images', ImageController::class)->except(['create', 'edit']);
        Route::resource('skills', SkillController::class)->except(['create', 'edit']);
        Route::resource('tags', TagController::class)->except(['create', 'edit']);

        Route::post('roles/{id}/add-permission', [RoleController::class, 'add_permission']);
        Route::post('roles/{id}/remove-permission', [RoleController::class, 'remove_permission']);
    });

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});
