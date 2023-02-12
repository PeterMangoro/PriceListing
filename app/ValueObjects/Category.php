<?php

namespace App\ValueObjects;

class Category
{
    public readonly string $formatted;

    public static function from(object $category):string
    {
        return $category->title;
    }
}
