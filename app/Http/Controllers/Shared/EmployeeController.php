<?php

namespace App\Http\Controllers\Shared;

use App\Handlers\Shared\EmployeeHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shared\Employee\EmployeeCreateRequest;
use App\Http\Requests\Shared\Employee\EmployeeUpdateRequest;
use App\Models\Shared\Employee;
use App\View\Shared\Employee\EmployeeIndexProps;
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
        EmployeeHandler::employ_worker_from_request($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shared\Employee  $employee
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
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
        // dd($employee);

        EmployeeHandler::update_employee($request, $employee);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shared\Employee  $employee
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
    }
}
