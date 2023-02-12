<?php

namespace App\Handlers\Shared;

use App\Models\Shared\Employee;
use App\Events\Employee\CreatingEmployee;
use App\Events\Employee\UpdatingEmployee;
use App\DataObjects\Employee\EmployeeForUpdate;
use App\DataObjects\Employee\EmployeeCreateData;
use App\Http\Requests\Shared\Employee\EmployeeCreateRequest;
use App\Http\Requests\Shared\Employee\EmployeeUpdateRequest;



class EmployeeHandler
{   

    public static function create(EmployeeCreateRequest $request)
    {
        $validated_object = EmployeeCreateData::fromRequest($request);
        CreatingEmployee::dispatch($validated_object);
    }

    public static function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $validated_object = EmployeeForUpdate::fromRequest($request);
        UpdatingEmployee::dispatch($validated_object, $employee);
    }
}
