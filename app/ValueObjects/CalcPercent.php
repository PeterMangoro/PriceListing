<?php

namespace App\ValueObjects;

class CalcPercent
{
    public static function between(int $old, int $new):string
    {
        return Percentage::from(($old - $new) / $old);
    }
}
