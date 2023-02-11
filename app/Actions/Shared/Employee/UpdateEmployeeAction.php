<?php

namespace App\Actions\Shared\Employee;

class UpdateEmployeeAction
{
    public static function handle(
        object $request,
        object $employee
    ): void {
        $employee->name = $request->name;
        $employee->position = $request->position;
        $employee->save();
    }
}
