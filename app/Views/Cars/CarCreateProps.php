<?php

namespace App\Views\Cars;

use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\CarCategory;
use App\View\Shared\BaseView;
use App\View\Shared\CarMakes;

class CarCreateProps extends BaseView
{
    public function carMakes()
    {
        return (new CarMakes())->carMakes();
    }

    public function category_types()
    {
        return ModelHandler::getUnPaginatedData(
            new CarCategory()
        )
            ->sortBy('type')
            ->groupBy('type');
    }
}
