<?php

namespace App\Views\Transports;

use App\Handlers\Car\CarHandler;
use App\View\Shared\BaseView;
use App\View\Shared\CarMakes;

class TransportCreateProps extends BaseView
{
    public function carMakes()
    {
        return (new CarMakes())->carMakes();
    }

    public function ownerCars()
    {
        return CarHandler::get_plain_user_cars();
    }
}
