<?php

namespace App\ValueObjects;

class SaleStatus
{
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
