<?php

namespace App\Views\Transports;

use App\Handlers\Shared\ModelHandler;
use App\Models\Car\Car;
use App\Views\Shared\BaseView;
use App\Views\Shared\CarMakes;

class TransportCreateProps extends BaseView
{
    public function carMakes()
    {
        return (new CarMakes())->carMakes();
    }

    public function ownerCars()
    {
        return ModelHandler::getUnPaginatedData(Car::belongsToAuthUser());
    }
}
