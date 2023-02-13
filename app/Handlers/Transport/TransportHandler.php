<?php

namespace App\Handlers\Transport;

use App\DataObjects\Transport\TransportData;
use App\Events\Transport\CreatingTransport;
use App\Events\Transport\UpdatingTransport;
use App\Http\Requests\Transport\CreateTransportRequest;
use App\Http\Requests\Transport\UpdateTransportRequest;

class TransportHandler
{
    public static function store(CreateTransportRequest $request)
    {
        $validated_object = TransportData::fromRequest($request);
        event(new CreatingTransport($validated_object));
    }

    public static function update(UpdateTransportRequest $request, string $uuid)
    {
        $validated_object = TransportData::fromRequest($request);
        event(new UpdatingTransport($validated_object, $uuid));
    }
}
