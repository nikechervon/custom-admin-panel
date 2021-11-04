<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/** Страница регистрации пользователя */
Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');

/** Регистрация пользователя */
Route::post('/register', [RegisterController::class, 'store']);

/** Страница авторизации пользователя */
Route::get('/login', [LoginController::class, 'create'])
    ->name('login');

/** Авторизация пользователя */
Route::post('/login', [LoginController::class, 'store']);

/** Завершение сессии авторизации */
Route::post('/logout', [LoginController::class, 'destroy'])
    ->name('logout');
