<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class EmployeeCreateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        // Делаю проверку в authorize(),
        // что бы проверка прав была перед валидацией
        return Gate::check('create', User::class);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|string|unique:users',
            'password' => 'required|min:6',
        ];
    }
}
