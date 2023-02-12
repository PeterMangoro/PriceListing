<?php

namespace App\DataObjects\Room\Partials;

use App\ValueObjects\Discount;
use App\ValueObjects\Money;

class RoomClientDisplay
{
    public function __construct(
        public  readonly string $title,
        public  readonly string $price,
        public  readonly string $uuid,
        public  readonly string $latest_image,
        public  readonly string $type,
        public  readonly string $town,
        public  readonly ?object $discount,
    ) {
        
    }
    public static function data(
        object $room,
         ?string $morph = null)
    {
        $price = $room->price ?? $room->$morph->price;

        if ($room->discount === null) {
            $discount = null;
        } else {
            $room->discount ? 
            $discount = Discount::from($room->discount, $price) : 
            $discount = Discount::from($room->$morph->discount, $price);
        }

        return new self(
            $room->$morph->title ?? $room->title,
             $room->price ? 
             Money::from($room->price) : 
             Money::from($room->$morph->price),
            $room->uuid ?? $room->$morph->uuid,
            collect($room)['latest_image']['path'] ?? 
            collect($room)[$morph]['latest_image']['path'] ?? 
            '/storage/no-thumbnail/No_image_available.svg',
            $room->address->type ??
             $room->$morph->address->type,
            $room->address->town ??
             $room->$morph->address->town,
            $discount
        );
    }
}
