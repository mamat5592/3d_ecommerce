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

        Route::resource('users', UserController::class)->only(['store', 'update', 'destroy']);
        Route::resource('3d-models', ThreeDModelController::class)->only(['store', 'update', 'destroy'])->parameters(['3d-models' => 'threeDModels']);
        Route::resource('comments', CommentController::class)->only(['store', 'update', 'destroy']);
        Route::resource('categories', CategoryController::class)->only(['store', 'update', 'destroy']);
        Route::resource('images', ImageController::class)->only(['store', 'update', 'destroy']);
        Route::resource('skills', SkillController::class)->only(['store', 'update', 'destroy']);
        Route::resource('tags', TagController::class)->only(['store', 'update', 'destroy']);

        Route::resource('roles', RoleController::class)->except(['create', 'edit']);
        Route::resource('permissions', PermissionController::class)->except(['create', 'edit']);
        Route::resource('bookmarks', BookmarkController::class)->except(['create', 'edit']);
        Route::resource('carts', CartController::class)->except(['create', 'edit']);
        Route::resource('files', FileController::class)->except(['create', 'edit']);

        Route::post('3d-models/{id}/add-category', [ThreeDModelController::class, 'add_category']);
        Route::delete('3d-models/{id}/remove-category', [ThreeDModelController::class, 'remove_category']);
        Route::post('3d-models/{id}/add-tag', [ThreeDModelController::class, 'add_tag']);
        Route::delete('3d-models/{id}/remove-tag', [ThreeDModelController::class, 'remove_tag']);

        Route::post('users/{id}/add-role', [UserController::class, 'add_role']);
        Route::delete('users/{id}/remove-role', [UserController::class, 'remove_role']);
        Route::post('users/{id}/add-skill', [UserController::class, 'add_skill']);
        Route::delete('users/{id}/remove-skill', [UserController::class, 'remove_skill']);

        Route::post('roles/{id}/add-permission', [RoleController::class, 'add_permission']);
        Route::delete('roles/{id}/remove-permission', [RoleController::class, 'remove_permission']);
    });

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::resource('users', UserController::class)->only(['index', 'show']);
    Route::resource('3d-models', ThreeDModelController::class)->only(['index', 'show'])->parameters(['3d-models' => 'threeDModels']);
    Route::resource('comments', CommentController::class)->only(['index', 'show']);
    Route::resource('categories', CategoryController::class)->only(['index', 'show']);
    Route::resource('images', ImageController::class)->only(['index', 'show']);
    Route::resource('skills', SkillController::class)->only(['index', 'show']);
    Route::resource('tags', TagController::class)->only(['index', 'show']);
});
