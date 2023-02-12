<?php

namespace App\DataObjects\Employee;

class EmployeeForUpdate
{
    public function __construct(
        public readonly string $name,
        public readonly string $position,
        public readonly ?array $avatar
    ) {
       
    }

    public static function fromRequest($request)
    {
        return new self(
            $request->name,
            $request->position,
            $request->avatar ? [$request->avatar] : null,
        );
    }
}
