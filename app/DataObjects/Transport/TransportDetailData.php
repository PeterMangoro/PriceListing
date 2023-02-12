<?php

namespace App\DataObjects\Transport;

use App\ValueObjects\Attachments;
use App\ValueObjects\Money;
use App\ValueObjects\Socials;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class TransportDetailData
{
    public function __construct(
        public readonly  Collection $images,
        public readonly  string $car_make,
        public readonly  string $car_model,
        public readonly  ?string $date,
        public readonly  ?string $remaining_time,
        public readonly  string $detail,
        public readonly  string $num_plate,
        public readonly  int $passengers,
        public  readonly string $departure,
        public  readonly string $destination,
        public readonly  ?string $price,
        public  readonly string $owner,
        public  readonly string $username,
        public  readonly Collection $contact,
    ) {
        
    }
    public static function toWebPage($transport)
    {
        return new self(
            Attachments::imagesFrom($transport->car->attachments),
            collect($transport)['car_make']['title'],
            collect($transport)['car_model']['title'],
            Carbon::parse($transport->date)->toDayDateTimeString(),
            Carbon::parse($transport->date)->diffForHumans([
                'parts' => 2,
                'short' => true,
                // 'aUnit'=>true
            ]),
            $transport->detail,
            $transport->num_plate,
            $transport->passengers,
            $transport->departure,
            $transport->destination,
            Money::from($transport->price),
            $transport->user->name,
            $transport->user->username,
            Socials::from($transport->user->socials)
        );
    }
}
