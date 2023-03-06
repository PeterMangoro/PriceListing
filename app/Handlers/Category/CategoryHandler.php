<?php

namespace App\Handlers\Category;

use App\Actions\Shared\Category\GetCategory;

class CategoryHandler
{
    public static function getAllCategories($data)
    {
        return $data->selectMinAttributes()->get();
    }

    public static function getCategory($data)
    {
        return $data->first();
    }

    public static function getCategoryTypes($data)
    {
        return GetCategory::types($data);
    }
}
