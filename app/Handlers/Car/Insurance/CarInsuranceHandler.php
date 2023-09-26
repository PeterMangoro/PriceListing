<?php

namespace App\Handlers\Car\Insurance;

use App\Events\Car\Insurance\CreatingCarInsurance;
use App\Events\Car\Insurance\UpdatingCarInsurance;
use App\DataObjects\Car\Insurance\CarInsuranceCreateData;
use App\DataObjects\Car\Insurance\CarInsuranceUpdateData;
use App\Http\Requests\Car\Insurance\CreateCarInsuranceRequest;
use App\Http\Requests\Car\Insurance\UpdateCarInsuranceRequest;


class CarInsuranceHandler
{
    public static function store(CreateCarInsuranceRequest $request)
    {
        $validated_object = CarInsuranceCreateData::fromRequest($request);
        event(new CreatingCarInsurance($validated_object));
    }

    public static function update(UpdateCarInsuranceRequest $request, string $uuid)
    {
        $validated_object = CarInsuranceUpdateData::fromRequest($request);
        event(new UpdatingCarInsurance($validated_object, $uuid));
    }
}
