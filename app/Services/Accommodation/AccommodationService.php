<?php

namespace App\Services\Accommodation;

use App\Actions\Mall\Accommodation\CreateAccommodationAction;
use App\Actions\Mall\Accommodation\UpdateAccommodationAction;


class AccommodationService
{
    public static function create(object $request)
    {
        return CreateAccommodationAction::handle($request);
    }

    public static function update(object $request, object $accommodation)
    {
        return UpdateAccommodationAction::handle($request, $accommodation);
    }

   
}
