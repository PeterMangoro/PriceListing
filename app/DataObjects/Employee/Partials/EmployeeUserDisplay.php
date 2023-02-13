<?php

namespace App\DataObjects\Employee\Partials;

class EmployeeUserDisplay
{
    public function __construct(
        public readonly  int $id,
        public readonly  string $name,
        public readonly  string $position,
        public  readonly string $image,
    ) {
    }

    public static function data(object $employee)
    {
        return new self(
            $employee->id,
            $employee->name,
            $employee->position,
            collect($employee)['attachments'][0]['path'] ?:
            '/storage/no-thumbnail/No_image_available.svg',
        );
    }
}
