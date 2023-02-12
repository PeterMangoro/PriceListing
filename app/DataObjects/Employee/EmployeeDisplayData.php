<?php

namespace App\DataObjects\Employee;

use App\DataObjects\Employee\Partials\EmployeeClientDisplay;
use App\DataObjects\Employee\Partials\EmployeeUserDisplay;

class EmployeeDisplayData
{
    public static function toWebPage(
        object $employees, 
        ?string $morph = null)
    {
        return 
        $employees->through(
            fn ($employee) => 
            EmployeeClientDisplay::data($employee, $morph));
    }

    public static function collectionToWebPage(
        $employees, 
        ?string $morph = null)
    {
        return 
        $employees->map(
            fn ($employee) => 
            EmployeeClientDisplay::data($employee, $morph));
    }

    public static function toOwnerDisplay($employees)
    {
        return $employees->through(fn ($employee) => EmployeeUserDisplay::data($employee));
    }
}
