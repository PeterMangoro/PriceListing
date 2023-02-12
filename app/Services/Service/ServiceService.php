<?php

namespace App\Services\Service;

use App\Actions\Mall\Service\CreateServiceAction;
use App\Actions\Mall\Service\UpdateServiceAction;


class ServiceService
{
    public static function create(object $request)
    {
        return CreateServiceAction::handle($request);
    }

    public static function update(object $request, object $service)
    {
        return UpdateServiceAction::handle($request, $service);
    }
}
