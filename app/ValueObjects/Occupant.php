<?php

namespace App\ValueObjects;

class Occupant
{
    public static function from(?string $name): string
    {
        if ($name) {
            return $name;
        }
        return 'None';
    }
}
