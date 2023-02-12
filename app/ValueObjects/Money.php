<?php

namespace App\ValueObjects;

class Money
{
    public readonly ?float $value;

    public static function from(?float $value): string
    {
        return '$' . number_format($value, 2);
    }
}
