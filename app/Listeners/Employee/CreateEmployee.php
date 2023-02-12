<?php

namespace App\Listeners\Employee;

use App\Models\Shared\Employee;
use Illuminate\Support\Facades\DB;
use App\Services\Shared\EmployeeService;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Employee\CreatingEmployee;
use App\Services\Shared\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateEmployee
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Employee\CreatingEmployee  $event
     * @return void
     */
    public function handle(CreatingEmployee $event)
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
            $employee_id = EmployeeService::create($request);
            $employee = Employee::find($employee_id);
            AttachmentService::addImages($request->avatar, $employee, 'employee', 300);
        });
    }
}
