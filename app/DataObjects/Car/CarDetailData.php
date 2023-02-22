<?php

namespace App\DataObjects\Car;

use App\ValueObjects\Address;
use App\ValueObjects\Attachments;
use App\ValueObjects\Discount;
use App\ValueObjects\Money;
use App\ValueObjects\Ratings;
use App\ValueObjects\Socials;
use Illuminate\Support\Collection;

class CarDetailData
{
    public function __construct(
        public readonly  int $id,
        public readonly   Collection|array $images,
        public readonly   Collection|array|null $documents,
        public  readonly string $car_make,
        public  readonly string $car_model,
        public  readonly array $detail,
        public  readonly object $location,
        public  readonly string $price,
        public  readonly string $owner,
        public readonly  string $username,
        public readonly  ?Collection $contact,
        public readonly  ?object $ratings,
        public readonly  ?object $discount,
    ) {
    }
    public static function toWebPage($car)
    {
        $price = $car->price;

        if ($car->discount === null) {
            $discount = null;
        } else {
            $discount = Discount::from($car->discount, $price);
        }
        return new self(
            $car->id,
            Attachments::imagesFrom($car->attachments),
            Attachments::documentsFrom($car->documents),
            $car->car_make,
            $car->car_model,
            $car->detail,
            Address::from($car->user->address),
            Money::from($car->price),
            $car->user->name,
            $car->user->username,
            Socials::from($car->user->socials),
            Ratings::from($car->ratings),
            $discount,
        );
    }
}
