<?php

use App\Controllers\AuthController;
use App\Core\Route;
use App\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);

Route::get('/login', [AuthController::class, 'viewLogin']);
Route::get('/register', [AuthController::class, 'viewRegister']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);