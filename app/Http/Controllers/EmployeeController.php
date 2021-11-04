<?php

namespace App\Http\Controllers;

use App\Actions\CreateEmployeeAction;
use App\Http\Requests\EmployeeCreateRequest;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * @controller EmployeeController
 * @description Отвечает за работу с работниками
 */
class EmployeeController extends Controller
{
    /**
     * @constructor EmployeeController
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Страница создания сотрудника
     *
     * @return View
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('create', User::class);

        return view('employee.create');
    }

    /**
     * Создание сотрудника
     *
     * @param EmployeeCreateRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeCreateRequest $request): RedirectResponse
    {
        CreateEmployeeAction::run($request);
        session()->flash('success', 'Сотрудник успешно создан!');
        return back();
    }
}
