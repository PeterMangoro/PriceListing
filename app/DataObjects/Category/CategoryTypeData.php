<?php

namespace App\DataObjects\Category;

class CategoryTypeData
{
    public static function forDisplay(object $category_types)
    {
        return 
        $category_types->map(
            fn ($category_type) => [
            'title' => $category_type->title ?? 
            $category_type['title'],
            'type' => $category_type->type ?? 
            $category_type['type'],
        ]);
    }
}
