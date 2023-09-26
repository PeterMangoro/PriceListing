<?php

namespace App\ValueObjects;

use Carbon\Carbon;

class Time
{
    public static function betweenNowAnd($date)
    {
        return Carbon::parse($date)->diffForHumans([
            'parts' => 2,
            'short' => true,
            // 'aUnit'=>true
        ]);
    }

    public static function readable($date)
    {
        return Carbon::parse($date)->toDayDateTimeString();
    }

    public static function date($date)
    {
        return Carbon::parse($date)->toFormattedDayDateString();
    }
}
