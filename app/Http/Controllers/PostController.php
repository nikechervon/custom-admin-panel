<?php

namespace App\Http\Controllers;

use App\Actions\Posts\CreatePostAction;
use App\Actions\Posts\DeletePostAction;
use App\Actions\Posts\GetPostsAction;
use App\Actions\Posts\UpdatePostAction;
use App\Enums\MediaCollections;
use App\Http\Requests\Post\PostCreateRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Models\Post;
use App\Repositories\Post\CategoriesRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

/**
 * @controller PostController
 * @description Отвечает за работу с записями
 */
class PostController extends Controller
{
    /**
     * @constructor RegisterController
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Страница создания записи
     *
     * @return View
     */
    public function create(): View
    {
        return view('post.create')->with([
            'categories' => $this->getCategories(),
        ]);
    }

    /**
     * @return View
     */
    public function list(): View
    {
        $posts = GetPostsAction::run(auth()->user());

        return view('post.list')->with([
            'posts' => $posts,
        ]);
    }

    /**
     * Создание записи
     *
     * @param PostCreateRequest $request
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(PostCreateRequest $request): RedirectResponse
    {
        CreatePostAction::run($request);
        session()->flash('success', 'Запись успешно создана!');
        return back();
    }

    /**
     * Страница обновления записи
     *
     * @param Post $post
     * @return View
     */
    public function edit(Post $post): View
    {
        return view('post.update')->with([
            'post' => $post,
            'image' => $post->getFirstMediaUrl(MediaCollections::POSTS),
            'categories' => $this->getCategories(),
        ]);
    }

    /**
     * Детальная страница записи
     *
     * @param Post $post
     * @return View
     */
    public function show(Post $post): View
    {
        return view('post.item')->with([
            'post' => $post,
            'image' => $post->getFirstMediaUrl(MediaCollections::POSTS),
        ]);
    }

    /**
     * Обновление записи
     *
     * @param PostUpdateRequest $request
     * @param Post $post
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(PostUpdateRequest $request, Post $post): RedirectResponse
    {
        UpdatePostAction::run($request, $post);
        session()->flash('success', 'Запись успешно обновлена!');
        return back();
    }

    /**
     * Удаление записи
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function delete(Post $post): RedirectResponse
    {
        DeletePostAction::run($post);
        session()->flash('success', 'Запись успешно удалена!');
        return back();
    }

    /**
     * @return array
     */
    private function getCategories(): array
    {
        return app(CategoriesRepository::class)->all()->toArray();
    }
}
