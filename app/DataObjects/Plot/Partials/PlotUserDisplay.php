<?php

namespace App\DataObjects\Plot\Partials;

use App\ValueObjects\Address;
use App\ValueObjects\Money;
use App\ValueObjects\SaleStatus;

class PlotUserDisplay
{
    public function __construct(
        public readonly  int $id,
        public  readonly string $size,
        public  readonly object $location,
        public  readonly string $price,
        public  readonly string $uuid,
        public  readonly string $detail,
        public  readonly string $status,
    ) {
        
    }
    public static function data($plot)
    {
        return new self(
            $plot->id,
            $plot->size . 'ha',
            Address::from($plot->address),
            Money::from($plot->price),
            $plot->uuid,
            $plot->detail,
            SaleStatus::from($plot->sale_status)
        );
    }
}
