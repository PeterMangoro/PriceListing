<?php

namespace App\ValueObjects;

class SaleStatus
{
    public readonly bool $value;

    public static function from(?bool $value): string
    {
        if ($value === false) {
            $status = 'Not For Sale';
        } else {
            $status = 'For Sale';
        }
        return $status;
    }
}
