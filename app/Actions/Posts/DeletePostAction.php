<?php

namespace App\Actions\Posts;

use App\Actions\AbstractAction;
use App\Models\Post;

/**
 * @action DeletePostAction
 * @description Удаление записи
 */
class DeletePostAction extends AbstractAction
{
    /**
     * @param Post $post
     */
    public static function run(Post $post): void
    {
        $post->delete();
    }
}
