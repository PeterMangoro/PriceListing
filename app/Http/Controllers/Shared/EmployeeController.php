<?php

namespace App\Http\Controllers\Shared;

use App\Handlers\Shared\EmployeeHandler;
use App\Handlers\Shared\ModelHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shared\Employee\EmployeeCreateRequest;
use App\Http\Requests\Shared\Employee\EmployeeUpdateRequest;
use App\Models\Shared\Employee;
use App\Views\Shared\Employee\EmployeeIndexProps;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Profile/Employee/index', [
            'data' => new EmployeeIndexProps(),
        ]);
    }

    public function store(EmployeeCreateRequest $request)
    {
        EmployeeHandler::store($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shared\Employee  $employee
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        Inertia::render('Profile/Employee/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shared\Employee  $employee
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        EmployeeHandler::update($request, $employee);
        return back();
    }

    public function destroy(Employee $employee): void
    {
        ModelHandler::delete($employee);
    }
}
