<?php

namespace App\Actions\Posts;

use App\Actions\AbstractAction;
use App\Enums\Roles;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @action GetPostsAction
 * @description Получение списка записей
 */
class GetPostsAction extends AbstractAction
{
    /**
     * @param Authenticatable|User $user
     * @return LengthAwarePaginator
     */
    public static function run(Authenticatable|User $user): LengthAwarePaginator
    {
        return match ($user->role->name) {
            Roles::EMPLOYEE => self::getByEmployee($user),
//            Roles::MANAGER => '',
        };
    }

//    private static function getByManager(): LengthAwarePaginator
//    {
//
//    }

    /**
     * @param User $user
     * @return LengthAwarePaginator
     */
    private static function getByEmployee(User $user): LengthAwarePaginator
    {
        return $user->posts()->paginate(10);
    }
}
