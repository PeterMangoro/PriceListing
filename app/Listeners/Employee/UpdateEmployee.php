<?php

namespace App\Listeners\Employee;

use Illuminate\Support\Facades\DB;
use App\Services\Shared\EmployeeService;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Employee\UpdatingEmployee;
use App\Services\Shared\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateEmployee
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
     * @param  \App\Events\Employee\UpdatingEmployee  $event
     * @return void
     */
    public function handle(UpdatingEmployee $event)
    {
        $request = $event->request;
        $employee = $event->employee;

        DB::transaction(function () use ($request, $employee) {
            EmployeeService::update($request, $employee);           
            $request->avatar ? 
            AttachmentService::addEmployeeImage($request->avatar, $employee, 'employee', 300) : null;
        });
    }
}
