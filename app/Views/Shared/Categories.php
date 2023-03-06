<?php

namespace App\Views\Shared;

use App\Handlers\Category\CategoryHandler;

class Categories
{
    public static function getAllCategories($data)
    {
        return CategoryHandler::getAllCategories($data);
    }

    public static function getCategoriesOfType($data, $type)
    {
        return $data->ofType($type)->get();
    }
}
