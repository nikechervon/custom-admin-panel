<?php

namespace App\Observers;

use App\Enums\MediaCollections;
use App\Models\Post;

class PostObserver
{
    /**
     * @param Post $post
     */
    public function deleted(Post $post)
    {
        $post->getFirstMedia(MediaCollections::POSTS)->delete();
    }
}
