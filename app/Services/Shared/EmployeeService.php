<?php

namespace App\Services\Shared;

use App\Actions\Shared\Employee\CreateEmployeeAction;
use App\Actions\Shared\Employee\UpdateEmployeeAction;

class EmployeeService
{
    public static function create(object $request): int
    {
        return CreateEmployeeAction::handle($request);
    }

    public static function update(
        object $request,
        object $employee
    ): void {
        UpdateEmployeeAction::handle($request, $employee);
    }
}
