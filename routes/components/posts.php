<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/** Список записей */
Route::get('/posts', [PostController::class, 'list'])
    ->name('posts');

/** Страница создания записи */
Route::get('/posts/new', [PostController::class, 'create'])
    ->name('post-create');

/** Страница просмотра записи */
Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('post');

/** Создание записи */
Route::post('/posts', [PostController::class, 'store']);

/** Страница обновления записи */
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->name('post-edit');

/** Обновление записи */
Route::patch('/posts/{post}', [PostController::class, 'update']);

/** Удаление записи */
Route::delete('/posts/{post}', [PostController::class, 'delete']);
