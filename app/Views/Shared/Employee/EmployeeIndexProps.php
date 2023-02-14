<?php

namespace App\Views\Shared\Employee;

use App\DataObjects\Employee\EmployeeDisplayData;
use App\Handlers\Shared\EmployeeHandler;
use App\Handlers\Shared\ModelHandler;
use App\Models\Shared\Employee;
use App\Views\Shared\BaseView;

class EmployeeIndexProps extends BaseView
{
    public function employees()
    {
        return EmployeeDisplayData::toOwnerDisplay(
            EmployeeHandler::getAllEmployees(
                Employee::belongsToAuthUser(),
                12
            )
        );
    }
}
