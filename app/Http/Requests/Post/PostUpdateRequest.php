<?php

namespace App\Http\Requests\Post;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class PostUpdateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        // Делаю проверку в authorize(),
        // что бы проверка прав была перед валидацией
        return Gate::check('update', [Post::class, $this->post]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:5000',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
