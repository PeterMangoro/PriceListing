<?php

namespace App\DataObjects\Accommodation\Room\Partials;

use App\ValueObjects\AvgRating;
use App\ValueObjects\Money;
use App\ValueObjects\Occupant;

class AccommodationRoomUserDisplay
{
    public function __construct(
        public readonly  string $room_name,
        public readonly  string $room_type,
        public  readonly string $occupant,
        public  readonly string $price,
        public  readonly string $uuid,
        public  readonly string $status,
        public  readonly string $ratings,
        public  readonly int $id,
    ) {
        
    }
    public static function data($room)
    {
        $occupant = collect($room)['guest']['guest'] ?? null;
        $state = $occupant ? 'Occupied' : 'Available';

        return new self(
            $room->title,
            $room->type,
            Occupant::from($occupant),
            Money::from(collect($room)['latest_price']['amount']),
            $room->uuid,
            $state,
            AvgRating::of($room->ratings),
            $room->id
        );
    }
}
