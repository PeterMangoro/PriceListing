<?php

namespace App\Views\Services;

use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\ServiceCategory;
use App\Views\Shared\BaseView;

class ServiceCreateProps extends BaseView
{
    public function category_types()
    {
        return CategoryHandler::getAllCategories(
            new ServiceCategory()
        )
            ->sortBy('type')
            ->groupBy('type');
    }
}
