<?php

namespace App\Actions\Auth;

use App\Actions\AbstractAction;
use App\Http\Requests\Auth\RegisterRequest;
use App\Tasks\Users\CreateUserTask;

/**
 * @action RegisterAction
 * @description Регистрация нового пользователя
 */
class RegisterAction extends AbstractAction
{
    /**
     * @param RegisterRequest $request
     */
    public static function run(RegisterRequest $request)
    {
        CreateUserTask::manager($request->email, $request->password);
        $request->session()->regenerate();
    }
}
