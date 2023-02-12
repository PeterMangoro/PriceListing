<?php

namespace App\DataObjects\Car;

use App\DataObjects\Car\Partials\CarClientDisplay;
use App\DataObjects\Car\Partials\CarUserDisplay;

class CarDisplayData
{
    public static function toWebPage(
        object $cars, 
        ?string $morph = null)
    {
        return
         $cars->through(
            fn ($car) => 
            CarClientDisplay::data($car, $morph));
    }

    public static function collectionToWebPage(
        object $cars, 
        ?string $morph = null)
    {
        return 
        $cars->map(
            fn ($car) => 
            CarClientDisplay::data($car, $morph));
    }

    public static function toOwnerDisplay($cars)
    {
        return 
        $cars->through(
            fn ($car) => 
            CarUserDisplay::data($car));
    }
}
