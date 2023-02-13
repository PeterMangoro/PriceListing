<?php

namespace App\Handlers\Service;

use App\DataObjects\Service\ServiceCreateData;
use App\DataObjects\Service\ServiceUpdateData;
use App\Events\Service\CreatingService;
use App\Events\Service\UpdatingService;
use App\Http\Requests\Service\CreateServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;

class ServiceHandler
{
    public static function store(CreateServiceRequest $request)
    {
        $validated_object = ServiceCreateData::fromRequest($request);
        event(new CreatingService($validated_object));
    }

    public static function update(UpdateServiceRequest $request, string $uuid)
    {
        $validated_object = ServiceUpdateData::fromRequest($request);
        event(new UpdatingService($validated_object, $uuid));
    }
}
