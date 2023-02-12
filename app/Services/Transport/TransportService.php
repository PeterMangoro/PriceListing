<?php

namespace App\Services\Transport;

use App\Actions\Mall\Transport\CreateTripAction;
use App\Actions\Mall\Transport\UpdateTripAction;



class TransportService
{
    public function create(object $request, ?int $new_car_id = null)
    {
        return CreateTripAction::handle($request, $new_car_id);
    }

    public function update(object $request, object $transport)
    {
        return UpdateTripAction::handle($request, $transport);
    }
}
