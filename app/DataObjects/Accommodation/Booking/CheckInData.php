<?php

namespace App\DataObjects\Accommodation\Booking;

class CheckInData
{
    public function __construct(
        public readonly string $guest,
        public readonly string $service,
    ) {
        
    }

    public static function fromRequest(object $request)
    {
        return new self(
            $request->name,
            $request->service,
        );
    }
}
