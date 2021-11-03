<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/** Главная страница */
Route::get('/', [DashboardController::class, 'create'])
    ->middleware(['auth'])
    ->name('dashboard');

/** Роуты аутентификации */
require __DIR__ . '/auth.php';

/** Страница создания записи */
Route::get('/post', [PostController::class, 'create'])
    ->name('post-create');

/** Создание записи */
Route::post('/post', [PostController::class, 'store']);
