<?php

namespace App\Http\Controllers;

use App\Actions\CreateEmployeeAction;
use App\Http\Requests\EmployeeCreateRequest;
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
     */
    public function create(): View
    {
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
