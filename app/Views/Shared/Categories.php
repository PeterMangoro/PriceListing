<?php

namespace App\Views\Shared;

use App\Handlers\Shared\ModelHandler;

class Categories
{
    public static function getAllCategories($data)
    {
        return ModelHandler::getUnPaginatedData($data);
    }

    public static function getCategoriesOfType($data, $type)
    {
        return ModelHandler::getUnPaginatedData($data->ofType($type));
    }
}
