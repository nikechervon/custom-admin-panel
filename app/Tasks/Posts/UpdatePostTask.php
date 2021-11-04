<?php

namespace App\Tasks\Posts;

use App\Models\Post;
use App\Tasks\AbstractTask;

/**
 * @task UpdatePostTask
 * @description Обновление поста
 */
class UpdatePostTask extends AbstractTask
{
    /**
     * @param Post $post
     * @param array $data
     * @return Post
     */
    public static function run(Post $post, array $data): Post
    {
        $post->update($data);
        return $post;
    }
}
