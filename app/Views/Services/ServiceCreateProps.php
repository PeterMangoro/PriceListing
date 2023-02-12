<?php

namespace App\Views\Services;

use App\Handlers\Shared\ModelHandler;
use App\View\Shared\BaseView;
use App\Models\Categories\ServiceCategory;

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
