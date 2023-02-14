<?php

namespace App\Views\Services;

use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ServiceCategory;
use App\Views\Shared\BaseView;

class ServiceCreateProps extends BaseView
{
    public function category_types()
    {
        return ModelHandler::getUnPaginatedData(
            new ServiceCategory()
        )
            ->sortBy('type')
            ->groupBy('type');
    }
}