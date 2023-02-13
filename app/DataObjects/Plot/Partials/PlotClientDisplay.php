<?php

namespace App\DataObjects\Plot\Partials;

use App\ValueObjects\Address;
use App\ValueObjects\Money;

class PlotClientDisplay
{
    public function __construct(
        public readonly  string $size,
        public readonly  object $location,
        public readonly  string $price,
        public  readonly string $uuid,
    ) {
    }
    public static function data($plot)
    {
        return new self(
            $plot->size . 'ha',
            Address::from($plot->address),
            Money::from($plot->price),
            $plot->uuid
        );
    }
}
