<?php

namespace App\DataObjects\Category;

class CategoryData
{
    public static function forDisplay(object $categories)
    {
        return 
        $categories->map(
            fn ($category) => [
            'title' => $category->title,
            'type' => $category->slug ?: $category->title,
        ]);
    }
}
