<?php

namespace App\Repositories\Users;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

class RolesRepository
{
    /**
     * Получить роль по имени
     *
     * @param string $name
     * @return Model|Role
     */
    public function getByName(string $name): Model|Role
    {
        return Role::query()->where('name', $name)->first();
    }
}
