<?php

namespace App\Services\Car\Insurance;

use App\Actions\Car\Insurance\CreateCarInsuranceAction;
use App\Actions\Car\Insurance\UpdateCarInsuranceAction;


class CarInsuranceService
{
    public static function create(object $request)
    {
        return CreateCarInsuranceAction::handle($request);
    }

    public static function update(object $request, object $car_insurance)
    {
        return UpdateCarInsuranceAction::handle($request, $car_insurance);
    }
}
