<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Pagination\LengthAwarePaginator;

class PostsRepository
{
    /**
     * @param User|Authenticatable $manager
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getByManager(User|Authenticatable $manager, int $perPage): LengthAwarePaginator
    {
        $employees = $manager
            ->employees()
            ->pluck('employee_id')
            ->toArray();

        return Post::query()
            ->whereIn('user_id', $employees)
            ->paginate($perPage);
    }
}
