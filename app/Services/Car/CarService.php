<?php

namespace App\Services\Car;

use App\Actions\Car\CreateCarAction;
use App\Actions\Car\UpdateCarAction;




class CarService
{
    public static function create(object $request)
    {
        return CreateCarAction::handle($request);
    }

    public static function update(object $request, object $car)
    {
        return UpdateCarAction::handle($request, $car);
    }
}
