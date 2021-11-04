<?php

namespace App\Actions\Posts;

use App\Actions\AbstractAction;
use App\Models\User;
use App\Repositories\Post\PostsRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @action GetPostsAction
 * @description Получение списка записей
 */
class GetPostsAction extends AbstractAction
{
    public const PER_PAGE = 10;

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public static function run(Request $request): LengthAwarePaginator
    {
        if ($request->user()->isManager()) {
            $posts = self::getByManager($request);
        } else {
            $posts = self::getByEmployee($request->user());
        }

        // Фильтр по категории
        if ($category = $request->get('category')) {
            $posts = app(PostsRepository::class)->filterByCategory($posts, $category);
        }

        return $posts->paginate(self::PER_PAGE);
    }

    /**
     * @param Request $request
     * @return Builder
     */
    private static function getByManager(Request $request): Builder
    {
        $posts = app(PostsRepository::class)->getByManager($request->user());

        // Фильтр по автору
        if ($author = $request->get('author')) {
            $posts = app(PostsRepository::class)->filterByAuthor($posts, $author);
        }

        return $posts;
    }

    /**
     * @param Authenticatable|User $user
     * @return HasMany
     */
    private static function getByEmployee(Authenticatable|User $user): HasMany
    {
        return $user->posts();
    }
}
