<?php

namespace App\Handlers\Category;

use App\Actions\Mall\Model\GetDataAction;
use App\Actions\Shared\Category\GetCategory;
use App\Handlers\Shared\ModelHandler;

class CategoryHandler
{
    public static function getAllCategories($data)
    {
        return $data->selectMinAttributes->get();
    }

    public static function get_category($data)
    {
        return $data->first();
    }

    public static function getCategoryTypes($data)
    {
        return GetCategory::types($data);
    }
}
