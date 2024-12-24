<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts/', [PostController::class, 'posts']);

Route::get('posts/{id}', [PostController::class, 'getItem']);

Route::post('post', [PostController::class, 'create']);

Route::put('update', [PostController::class, 'update']);

Route::delete('delete', [PostController::class, 'delete']);
