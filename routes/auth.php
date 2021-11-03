<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/** Страница регистрации пользователя */
Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');

/** Регистрация пользователя */
Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest');

/** Страница авторизации пользователя */
Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');

/** Авторизация пользователя */
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest');

/** Завершение сессии авторизации */
Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
