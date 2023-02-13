<?php

namespace App\Views\Transports;

use App\Handlers\Shared\ModelHandler;
use App\Models\Car\Car;
use App\Models\Car\Transport;
use App\Views\Shared\BaseView;
use App\Views\Shared\CarMakes;

class TransportEditProps extends BaseView
{
    public function __construct(public $uuid)
    {
        $this->uuid = $uuid;
    }

    public function transport()
    {
        return ModelHandler::getModelForEdit(new Transport(), $this->uuid);
    }

    public function ownerCars()
    {
        return ModelHandler::getUnPaginatedData(Car::belongsToAuthUser());
    }

    public function carMakes()
    {
        return (new CarMakes())->carMakes();
    }
}
