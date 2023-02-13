<?php

namespace App\DataObjects\Accommodation;

use App\ValueObjects\Address;
use App\ValueObjects\Attachments;
use App\ValueObjects\Discount;
use App\ValueObjects\Money;
use App\ValueObjects\Ratings;
use App\ValueObjects\Socials;
use Illuminate\Support\Collection;

class AccommodationDetailData
{
    public function __construct(
        public  readonly int $id,
        public  readonly  Collection|array $images,
        public  readonly  Collection|array|null $documents,
        public  readonly int $a_rooms,
        public readonly  string $detail,
        public  readonly object $location,
        public  readonly string $price,
        public readonly  string $owner,
        public readonly  string $username,
        public readonly  ?Collection $contact,
        public readonly  ?object $ratings,
        public readonly  ?object $discount,
    ) {
    }
    public static function toWebPage($accommodation)
    {
        $price = $accommodation->price;

        if ($accommodation->discount === null) {
            $discount = null;
        } else {
            $discount = Discount::from($accommodation->discount, $price);
        }
        return new self(
            $accommodation->id,
            Attachments::imagesFrom($accommodation->attachments),
            Attachments::documentsFrom($accommodation->documents),
            $accommodation->a_rooms,
            $accommodation->detail,
            Address::from($accommodation->address),
            Money::from($accommodation->price),
            $accommodation->user->name,
            $accommodation->user->username,
            Socials::from($accommodation->user->socials),
            Ratings::from($accommodation->ratings),
            $discount,
        );
    }
}
