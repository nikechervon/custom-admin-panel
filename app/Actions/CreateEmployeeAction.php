<?php

namespace App\Actions;

use App\Http\Requests\EmployeeCreateRequest;
use App\Models\User;
use App\Tasks\Users\CreateUserTask;

/**
 * @action CreateEmployeeAction
 * @description Создание сотрудника
 */
class CreateEmployeeAction extends AbstractAction
{
    /**
     * @param EmployeeCreateRequest $request
     * @return User
     */
    public static function run(EmployeeCreateRequest $request): User
    {
        return CreateUserTask::employee(
            $request->email,
            $request->password,
            $request->user()
        );
    }
}
