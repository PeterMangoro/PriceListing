<?php

namespace App\Handlers\Accommodation;

use App\DataObjects\Accommodation\AccommodationCreateData;
use App\DataObjects\Accommodation\AccommodationUpdateData;
use App\Events\Accommodation\CreatingAccommodation;
use App\Events\Accommodation\UpdatingAccommodation;
use App\Http\Requests\Accommodation\CreateAccommodationRequest;
use App\Http\Requests\Accommodation\UpdateAccommodationRequest;

class AccommodationHandler
{
    public static function store(CreateAccommodationRequest $request)
    {
        $validated_object = AccommodationCreateData::fromRequest($request);
        event(new CreatingAccommodation($validated_object));
    }

    public static function update(
        UpdateAccommodationRequest $request,
        string $uuid
    ) {
        $validated_object = AccommodationUpdateData::fromRequest($request);
        event(new UpdatingAccommodation($validated_object, $uuid));
    }
}
