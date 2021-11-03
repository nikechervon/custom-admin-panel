<?php

namespace App\Http\Controllers;

use App\Actions\Posts\CreatePostAction;
use App\Http\Requests\Post\PostCreateRequest;
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
        $categories = app(CategoriesRepository::class)->all();

        return view('post.create')->with([
            'categories' => $categories->toArray(),
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
}
