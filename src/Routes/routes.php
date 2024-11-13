<?php

use App\Controllers\AuthController;
use App\Core\Route;
use App\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/user', [PostController::class, 'usersPosts']);
Route::get('/posts/edit/{id}', [PostController::class, 'edit']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'store']);
Route::post('/posts/update/{id}', [PostController::class, 'update']);
Route::post('/posts/{id}', [PostController::class, 'destroy']);

Route::get('/login', [AuthController::class, 'viewLogin']);
Route::get('/register', [AuthController::class, 'viewRegister']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);