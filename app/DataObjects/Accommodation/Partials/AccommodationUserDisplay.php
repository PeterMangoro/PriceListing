<?php

namespace App\DataObjects\Accommodation\Partials;

use App\ValueObjects\Address;
use App\ValueObjects\AvgRating;
use App\ValueObjects\Money;
use App\ValueObjects\SaleStatus;

class AccommodationUserDisplay
{
    public function __construct(
        public readonly  string $latest_image,
        public  readonly int $a_rooms,
        public  readonly string $price,
        public  readonly string $uuid,
        public  readonly string $detail,
        public  readonly string $status,
        public  readonly string $ratings,
        public  readonly object $address,
        public  readonly int $id,
    ) {
        
    }
    public static function data($accommodation)
    {        
        return new self(
            collect($accommodation)['latest_image']['path'] ??
                collect($accommodation)['featurable']['latest_image']['path'] ??
                '/storage/no-thumbnail/No_image_available.svg',
            $accommodation->a_rooms,
            Money::from($accommodation->price),
            $accommodation->uuid,
            $accommodation->detail,
            SaleStatus::from($accommodation->sale_status),
            AvgRating::of($accommodation->ratings),
            Address::from($accommodation->address),
            $accommodation->id
        );
    }
}
