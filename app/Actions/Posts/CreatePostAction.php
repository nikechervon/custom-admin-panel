<?php

namespace App\Actions\Posts;

use App\Actions\AbstractAction;
use App\Enums\MediaCollections;
use App\Helpers\MediaHelper;
use App\Http\Requests\Post\PostCreateRequest;
use App\Models\Post;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

/**
 * @action CreatePostAction
 * @description Создание новой статьи
 */
class CreatePostAction extends AbstractAction
{
    /**
     * @param PostCreateRequest $request
     * @return Post
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public static function run(PostCreateRequest $request): Post
    {
        /** @var Post $post */
        $post = Post::query()->create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'user_id' => $request->user()->id,
        ]);

        MediaHelper::new(
            $post, $request->file('image'),
            MediaCollections::POSTS
        );

        return $post;
    }
}
