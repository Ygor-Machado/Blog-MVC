<?php

use App\Core\Route;
use App\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
