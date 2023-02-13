<?php

namespace App\ValueObjects;

class AvgRating
{
    public static function of(object $value): string
    {
        return count($value) > 0
            ? number_format(($value->flatMap(fn ($r) => [
                $r->rating ?? $r['rating'],
            ])->avg()), 2)
            : 'No Reviews Yet';
    }
}
