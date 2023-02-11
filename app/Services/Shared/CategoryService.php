<?php

namespace App\Services\Shared;

use App\Actions\Shared\Category\AddCategory;

class CategoryService
{
    /**
     * @param array<int,int> $categories
     */
    public static function forModel(
        object $model,
        array $categories
    ): void {
        AddCategory::toModel(
            $model,
            $categories
        );
    }
}
