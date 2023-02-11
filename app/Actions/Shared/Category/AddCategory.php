<?php

namespace App\Actions\Shared\Category;

class AddCategory
{
    /**
     * @param array<int,int> $categories
     */
    public static function toModel(
        object $model,
        array $categories
    ): void {
        $model->categories()->sync($categories);
    }
}
