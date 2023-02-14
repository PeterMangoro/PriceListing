<?php

namespace App\ValueObjects;

class MakePoints
{
    /**
     * @return array<int , string>
     */
    public static function from(string $string): array
    {
        return array_filter(
            explode('*', $string)
        );
    }
}
