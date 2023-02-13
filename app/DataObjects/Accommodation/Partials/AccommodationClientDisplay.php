<?php

namespace App\DataObjects\Accommodation\Partials;

use App\ValueObjects\Discount;
use App\ValueObjects\Money;

class AccommodationClientDisplay
{
    public function __construct(
        public readonly int $a_rooms,
        public readonly string $price,
        public readonly string $uuid,
        public readonly string $latest_image,
        public readonly string $city,
        public readonly string $town,
        public readonly ?object $discount,
    ) {
    }
    public static function data(
        object $accommodation,
        ?string $morph = null
    ) {
        $price = $accommodation->price ??
        $accommodation->$morph->price;

        if ($accommodation->discount === null) {
            $discount = null;
        } else {
            $accommodation->discount ?
            $discount = Discount::from($accommodation->discount, $price) :
            $discount = Discount::from($accommodation->$morph->discount, $price);
        }

        return new self(
            $accommodation->$morph->a_rooms ??
            $accommodation->a_rooms,
            $accommodation->price ?
            Money::from($accommodation->price) :
            Money::from($accommodation->$morph->price),
            $accommodation->uuid ?? $accommodation->$morph->uuid,
            collect($accommodation)['latest_image']['path'] ??
            collect($accommodation)[$morph]['latest_image']['path']
            ?? '/storage/no-thumbnail/No_image_available.svg',
            $accommodation->address->city ??
            $accommodation->$morph->address->city,
            $accommodation->address->town ??
            $accommodation->$morph->address->town,
            $discount
        );
    }
}
