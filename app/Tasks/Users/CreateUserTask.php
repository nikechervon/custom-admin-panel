<?php

namespace App\Tasks\Users;

use App\Enums\Roles;
use App\Models\Role;
use App\Models\User;
use App\Repositories\Users\RolesRepository;
use App\Tasks\AbstractTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

/**
 * @task CreateUserTask
 * @description Создание пользователя
 */
class CreateUserTask extends AbstractTask
{
    /**
     * @param string $email
     * @param string $password
     * @return User
     */
    public static function manager(string $email, string $password): User
    {
        /** @var Role $role */
        $role = app(RolesRepository::class)->getByName(Roles::MANAGER);
        return self::user($email, $password, $role->id);
    }

    /**
     * @param string $email
     * @param string $password
     * @return User
     */
    public static function employee(string $email, string $password): User
    {
        /** @var Role $role */
        $role = app(RolesRepository::class)->getByName(Roles::EMPLOYEE);
        return self::user($email, $password, $role->id);
    }

    /**
     * @param string $email
     * @param string $password
     * @param string $roleID
     * @return Model|User
     */
    private static function user(string $email, string $password, string $roleID): Model|User
    {
        return User::query()->create([
            'email' => $email,
            'password' => Hash::make($password),
            'role_id' => $roleID,
        ]);
    }
}
