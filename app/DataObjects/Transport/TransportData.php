<?php

namespace App\DataObjects\Transport;

class TransportData
{
    public function __construct(
        public readonly  ?array $images,
        public readonly  ?int $car_id,
        public readonly  ?int $car_make_id,
        public readonly  ?int $car_model_id,
        public readonly  ?string $num_plate,
        public readonly  ?string $location,
        public readonly  ?string $sale_status,
        public readonly  ?string $rent_status,
        public readonly  string $detail,
        public readonly  string $departure,
        public  readonly string $destination,
        public readonly  ?string $choice,
        public  readonly string $date,
        public  readonly float $price,
        public readonly  int $passengers,
    ) {
    }
    public static function fromRequest($request)
    {
        return new self(
            $request->images,
            $request->car_id,
            $request->car_make_id,
            $request->car_model_id,
            $request->num_plate,
            true, #location
            null, #sale_status
            null, #rent_status
            $request->detail,
            $request->departure,
            $request->destination,
            $request->choice,
            $request->date,
            $request->price,
            $request->passengers,
        );
    }
}
