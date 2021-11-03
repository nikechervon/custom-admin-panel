<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/** Главная страница */
Route::get('/', [DashboardController::class, 'create'])
    ->middleware(['auth'])
    ->name('dashboard');

/** Роуты аутентификации */
require __DIR__ . '/components/auth.php';

/** Роуты для работы с записями */
require __DIR__ . '/components/posts.php';
