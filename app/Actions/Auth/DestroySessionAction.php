<?php

namespace App\Actions\Auth;

use App\Actions\AbstractAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @action RegisterAction
 * @description Завершение сессии авторизации
 */
class DestroySessionAction extends AbstractAction
{
    /**
     * @param Request $request
     */
    public static function run(Request $request): void
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
