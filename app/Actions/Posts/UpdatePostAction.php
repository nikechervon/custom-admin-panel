<?php

namespace App\Actions\Posts;

use App\Actions\AbstractAction;
use App\Enums\MediaCollections;
use App\Helpers\MediaHelper;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Models\Post;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

/**
 * @action UpdatePostAction
 * @description Обновление записи
 */
class UpdatePostAction extends AbstractAction
{
    /**
     * @param PostUpdateRequest $request
     * @param Post $post
     * @return Post
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public static function run(PostUpdateRequest $request, Post $post): Post
    {
        $post->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        if ($image = $request->file('image')) {
            MediaHelper::new($post, $image, MediaCollections::POSTS);
        }

        return $post;
    }
}
