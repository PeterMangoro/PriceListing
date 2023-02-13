<?php

namespace App\DataObjects\Transport;

use App\ValueObjects\Money;
use Carbon\Carbon;

class TransportDisplayData
{
    public function __construct(
        public readonly  ?string $date,
        public  readonly string $departure,
        public readonly  string $destination,
        public readonly  string $latest_image,
        public readonly  string $passengers,
        public readonly  ?string $price,
        public readonly  ?string $uuid,
    ) {
    }

    public static function toWebPage($transport)
    {
        return $transport->through(fn ($trip) => new self(
            Carbon::parse($trip->date)->toDayDateTimeString(),
            $trip->departure,
            $trip->destination,
            $trip->latest_image,
            $trip->passengers . ' passengers',
            Money::from($trip->price),
            $trip->uuid,
        ));
    }
}
