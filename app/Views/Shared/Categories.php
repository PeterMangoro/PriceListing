<?php

namespace App\View\Shared;

use App\Handlers\Category\CategoryHandler;
use App\Handlers\Shared\ModelHandler;

class Categories
{
    public static function get_all_categories($data)
    {
        return ModelHandler::getUnPaginatedData($data);
    }

    public static function get_categories_of_type($data, $type)
    {
        return ModelHandler::getUnPaginatedData($data->ofType($type));
    }
}
