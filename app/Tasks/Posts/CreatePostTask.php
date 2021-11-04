<?php

namespace App\Tasks\Posts;

use App\Models\Post;
use App\Tasks\AbstractTask;
use Illuminate\Database\Eloquent\Model;

/**
 * @task CreatePostTask
 * @description Создание записи
 */
class CreatePostTask extends AbstractTask
{
    /**
     * @param array $data
     * @return Model|Post
     */
    public static function run(array $data): Model|Post
    {
        return Post::query()->create($data);
    }
}
