<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * @controller RegisterController
 * @description Отвечает за работу регистрации пользователей
 */
class RegisterController extends Controller
{
    /**
     * Страница регистрации пользователя
     *
     * @return View
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Регистрация нового пользователя
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        RegisterAction::run($request);
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
