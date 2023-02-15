<?php

namespace App\Listeners\Employee;

use App\Events\Employee\CreatingEmployee;
use App\Models\Shared\Employee;
use App\Services\Shared\AttachmentService;
use App\Services\Shared\EmployeeService;
use Illuminate\Support\Facades\DB;

class CreateEmployee
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Employee\CreatingEmployee  $event
     *
     * @return void
     */
    public function handle(CreatingEmployee $event)
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
            $employee_id = EmployeeService::create($request);
            $employee = Employee::find($employee_id);
            AttachmentService::addImages($request->avatar, $employee, 'employee', 600);
        });
    }
}
