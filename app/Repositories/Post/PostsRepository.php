<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

class PostsRepository
{
    /**
     * Получить записи для менеджера
     *
     * @param User|Authenticatable $manager
     * @return Builder
     */
    public function getByManager(User|Authenticatable $manager): Builder
    {
        $employees = $manager
            ->employees()
            ->pluck('employee_id')
            ->toArray();

        return Post::query()
            ->select(['posts.*'])
            ->whereIn('user_id', $employees);
    }

    /**
     * Фильтр по автору
     *
     * @param Relation|Builder $builder
     * @param string $author
     * @return Relation|Builder
     */
    public function filterByAuthor(Relation|Builder $builder, string $author): Relation|Builder
    {
        $join = $builder->leftJoin('users', 'posts.user_id', '=', 'users.id');
        return $join->where('users.email', $author);
    }

    /**
     * Фильтр по категории
     *
     * @param Relation|Builder $builder
     * @param string $category
     * @return Relation|Builder
     */
    public function filterByCategory(Relation|Builder $builder, string $category): Relation|Builder
    {
        $join = $builder->leftJoin('categories', 'posts.category_id', '=', 'categories.id');
        return $join->where('categories.alias', $category);
    }
}
