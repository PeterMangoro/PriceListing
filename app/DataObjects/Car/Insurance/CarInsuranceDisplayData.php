<?php

namespace App\DataObjects\Car\Insurance;

use App\DataObjects\Car\Insurance\Partials\CarInsuranceUserDisplay;
use App\DataObjects\Car\Insurance\Partials\CarInsuranceClientDisplay;


class CarInsuranceDisplayData
{
    public static function toWebPage(
        object $car_insurances,
       
    ) {
        return $car_insurances->through(
            fn ($car_insurance) => CarInsuranceClientDisplay::data($car_insurance, )
        );
    }

    public static function collectionToWebPage(
        object $car_insurances,
       
    ) {
        return $car_insurances->map(
            fn ($car_insurance) => CarInsuranceClientDisplay::data($car_insurance, )
        );
    }

    public static function toOwnerDisplay($car_insurances)
    {
        return $car_insurances->through(
            fn ($car_insurance) => CarInsuranceUserDisplay::data($car_insurance)
        );
    }
}
