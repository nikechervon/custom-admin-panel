<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * @controller DashboardController
 * @description Отвечает за работу главной страницы
 */
class DashboardController extends Controller
{
    /**
     * @return View
     */
    public function create(): View
    {
        return view('dashboard');
    }
}
