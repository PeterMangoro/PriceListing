<?php

namespace App\ValueObjects;

class CategoryType
{
    public readonly string $formatted;

    public static function from(string $category_type): string
    {
        return preg_replace('/[_]/', ' ', $category_type);
    }
}
