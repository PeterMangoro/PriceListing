<?php

namespace App\Handlers\Car;

use App\Events\Car\CreatingCar;
use App\Events\Car\UpdatingCar;
use App\DataObjects\Car\CarCreateData;
use App\DataObjects\Car\CarUpdateData;
use App\Http\Requests\Car\CreateCarRequest;
use App\Http\Requests\Car\UpdateCarRequest;

class CarHandler
{
    
    public static function store(CreateCarRequest $request)
    {
        $validated_object = CarCreateData::fromRequest($request);
        event(new CreatingCar($validated_object));
    }

    public static function update(UpdateCarRequest $request, string $uuid)
    {
        $validated_object = CarUpdateData::fromRequest($request);
        event(new UpdatingCar($validated_object,$uuid));
    }

   
}
