<?php

namespace App\Actions\Posts;

use App\Actions\AbstractAction;
use App\Models\User;
use App\Repositories\Post\PostsRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @action GetPostsAction
 * @description Получение списка записей
 */
class GetPostsAction extends AbstractAction
{
    public const PER_PAGE = 10;

    /**
     * @param Authenticatable|User $user
     * @return LengthAwarePaginator
     */
    public static function run(Authenticatable|User $user): LengthAwarePaginator
    {
        if ($user->isManager()) {
            return self::getByManager($user);
        }

        return self::getByEmployee($user);
    }

    /**
     * @param User $user
     * @return LengthAwarePaginator
     */
    private static function getByManager(User $user): LengthAwarePaginator
    {
        return app(PostsRepository::class)->getByManager($user, self::PER_PAGE);
    }

    /**
     * @param User $user
     * @return LengthAwarePaginator
     */
    private static function getByEmployee(User $user): LengthAwarePaginator
    {
        return $user->posts()->paginate(self::PER_PAGE);
    }
}
