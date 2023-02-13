<?php

namespace App\DataObjects\Car\Partials;

use App\ValueObjects\AvgRating;
use App\ValueObjects\Money;
use App\ValueObjects\SaleStatus;

class CarUserDisplay
{
    public function __construct(
        public readonly  string $latest_image,
        public readonly  string $car_make,
        public readonly  string $car_model,
        public readonly  string $price,
        public  readonly string $uuid,
        public  readonly string $detail,
        public  readonly string $status,
        public  readonly string $ratings,
        public  readonly int $id,
    ) {
    }
    public static function data($car)
    {
        return new self(
            collect($car)['latest_image']['path'] ??
            collect($car)['featurable']['latest_image']['path'] ??
            '/storage/no-thumbnail/No_image_available.svg',
            $car->car_make,
            $car->car_model,
            Money::from($car->price),
            $car->uuid,
            $car->detail,
            SaleStatus::from($car->sale_status),
            AvgRating::of($car->ratings),
            $car->id
        );
    }
}
