<?php

namespace App\Tasks\Users;

use App\Enums\Roles;
use App\Models\ManagerEmployee;
use App\Models\Role;
use App\Models\User;
use App\Repositories\Users\RolesRepository;
use App\Tasks\AbstractTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
     * @param User $manager
     * @return User
     */
    public static function employee(string $email, string $password, User $manager): User
    {
        /** @var Role $role */
        $role = app(RolesRepository::class)->getByName(Roles::EMPLOYEE);

        // Транзакция
        DB::beginTransaction();

        $user = self::user($email, $password, $role->id);
        ManagerEmployee::query()->create([
            'employee_id' => $user->id,
            'manager_id' => $manager->id,
        ]);

        DB::commit();

        return $user;
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
