<?php

namespace App\Views\Cars;

use App\Views\Shared\BaseView;
use App\Views\Shared\CarMakes;

class CarCreateProps extends BaseView
{
    public function carMakes()
    {
        return (new CarMakes())->carMakes();
    }
}
