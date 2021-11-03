<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\DestroySessionAction;
use App\Actions\Auth\LoginAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

/**
 * @controller LoginController
 * @description Отвечает за работу аутентификации пользователей
 */
class LoginController extends Controller
{
    /**
     * @constructor LoginController
     */
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
        $this->middleware('auth')->only('destroy');
    }

    /**
     * Страница авторизации пользователя
     *
     * @return View
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Авторизация пользователя
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        LoginAction::run($request);
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Завершение сессии авторизации
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        DestroySessionAction::run($request);
        return redirect(RouteServiceProvider::HOME);
    }
}
