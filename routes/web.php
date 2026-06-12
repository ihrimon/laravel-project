<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', fn() => redirect()->route('posts.index'));

Route::resource('/posts', PostController::class);
Route::resource('/categories', CategoryController::class);