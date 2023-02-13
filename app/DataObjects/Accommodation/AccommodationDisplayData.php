<?php

namespace App\DataObjects\Accommodation;

use App\DataObjects\Accommodation\Partials\AccommodationClientDisplay;
use App\DataObjects\Accommodation\Partials\AccommodationUserDisplay;

class AccommodationDisplayData
{
    public static function toWebPage(
        object $accommodations,
        ?string $morph = null
    ) {
        return $accommodations->through(
            fn ($accommodation) => AccommodationClientDisplay::data($accommodation, $morph)
        );
    }

    public static function collectionToWebPage(
        $accommodations,
        ?string $morph = null
    ) {
        return $accommodations->map(
            fn ($accommodation) => AccommodationClientDisplay::data($accommodation, $morph)
        );
    }

    public static function toOwnerDisplay($accommodations)
    {
        return $accommodations->through(
            fn ($accommodation) => AccommodationUserDisplay::data($accommodation)
        );
    }
}
