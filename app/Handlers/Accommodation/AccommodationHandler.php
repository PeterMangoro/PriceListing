<?php

namespace App\Handlers\Accommodation;

use App\Events\Accommodation\CreatingAccommodation;
use App\Events\Accommodation\UpdatingAccommodation;
use App\DataObjects\Accommodation\AccommodationCreateData;
use App\DataObjects\Accommodation\AccommodationUpdateData;
use App\Http\Requests\Accommodation\UpdateAccommodationRequest;
use App\Http\Requests\Mall\Accommodation\CreateAccommodationRequest;

class AccommodationHandler
{
   

    public static function store(CreateAccommodationRequest $request)
    {
        $validated_object = AccommodationCreateData::fromRequest($request);
        event( new CreatingAccommodation($validated_object));
    }

    public static function update(
        UpdateAccommodationRequest $request, 
        string $uuid)
    {
        $validated_object = AccommodationUpdateData::fromRequest($request);
       event(new UpdatingAccommodation($validated_object,$uuid));
    }

  
}
