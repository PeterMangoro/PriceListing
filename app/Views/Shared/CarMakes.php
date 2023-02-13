<?php

namespace App\Views\Shared;

use App\Actions\Car\CarInfoAction;

class CarMakes
{
    public function carMakes()
    {
        return (new CarInfoAction())->handle();
    }
}
