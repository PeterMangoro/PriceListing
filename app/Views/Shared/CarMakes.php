<?php

namespace App\View\Shared;

use App\Actions\Mall\Car\CarInfoAction;

class CarMakes
{
    public function carMakes()
    {
        return (new CarInfoAction())->handle();
    }
}
