<?php

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
Route::get('/example', [ExampleController::class, 'show']);
Route::get('/', [PostController::class,'index'])->name('rou1');
Route::resource('posts', PostController::class);