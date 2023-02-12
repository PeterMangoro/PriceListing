<?php

namespace App\ValueObjects;

class Percentage
{
    public readonly ?float $value;

    public static function from(?float $value):string
    {
        if ($value === null) {
            $percent = '';
        } else {
            $percent = number_format($value * 100, 2) . '%';
        }
        return $percent;
    }
}
