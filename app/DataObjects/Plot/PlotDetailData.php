<?php

namespace App\DataObjects\Plot;

use App\ValueObjects\Address;
use App\ValueObjects\Attachments;
use App\ValueObjects\Money;
use App\ValueObjects\Socials;
use Illuminate\Support\Collection;

class PlotDetailData
{
    public function __construct(
        public readonly  string $size,
        public readonly  array $detail,
        public readonly  object $location,
        public readonly  string $owner,
        public readonly  string $username,
        public readonly  string $price,
        public readonly  Collection $contact,
        public readonly   Collection|array|null $images,
        public readonly   Collection|array|null $documents,
    ) {
    }
    public static function toWebPage($plot)
    {
        return new self(
            $plot->size . 'ha',
            $plot->detail,
            Address::from($plot->address),
            $plot->user->name,
            $plot->user->username,
            Money::from($plot->price),
            Socials::from($plot->user->socials),
            Attachments::imagesFrom($plot->attachments()->where('type', 'image')->get()),
            Attachments::documentsFrom($plot->documents),
        );
    }
}
