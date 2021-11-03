<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/** Страница создания сотрудника */
Route::get('/employees/new', [EmployeeController::class, 'create'])
    ->name('employee-create');

/** Создание сотрудника */
Route::post('/employees', [EmployeeController::class, 'store']);
