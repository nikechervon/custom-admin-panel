<?php

namespace App\Actions\Auth;

use App\Actions\AbstractAction;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

/**
 * @action LoginAction
 * @description Авторизация пользователя
 */
class LoginAction extends AbstractAction
{
    /**
     * @param LoginRequest $request
     * @throws ValidationException
     */
    public static function run(LoginRequest $request): void
    {
        $request->authenticate();
        $request->session()->regenerate();
    }
}
