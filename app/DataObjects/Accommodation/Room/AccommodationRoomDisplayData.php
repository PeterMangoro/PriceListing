<?php

namespace App\DataObjects\Accommodation\Room;

use App\DataObjects\Accommodation\Partials\AccommodationClientDisplay;
use App\DataObjects\Accommodation\Room\Partials\AccommodationRoomUserDisplay;

class AccommodationRoomDisplayData
{
    public static function toWebPage(
        object $accommodations, 
        ?string $morph = null)
    {
        return 
        $accommodations->through(
            fn ($accommodation) => 
            AccommodationClientDisplay::data($accommodation, $morph));
    }

    public static function collectionToWebPage(
        object $accommodations, 
        ?string $morph = null)
    {
        return 
        $accommodations->map(
            fn ($accommodation) =>
             AccommodationClientDisplay::data($accommodation, $morph));
    }

    public static function toOwnerDisplay($accommodations)
    {
        return $accommodations->through(
            fn ($accommodation) => 
            AccommodationRoomUserDisplay::data($accommodation));
    }
}
