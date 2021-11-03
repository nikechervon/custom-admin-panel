<?php

namespace App\Repositories\Post;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoriesRepository
{
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Category::all();
    }
}
