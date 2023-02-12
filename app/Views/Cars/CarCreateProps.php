<?php

namespace App\Views\Cars;

use App\Handlers\Shared\ModelHandler;
use App\View\Shared\BaseView;
use App\View\Shared\CarMakes;
use App\Models\Categories\CarCategory;


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
