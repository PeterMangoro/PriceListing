<?php

namespace App\DataObjects\Service;

use App\DataObjects\Service\Partials\ServiceClientDisplay;
use App\DataObjects\Service\Partials\ServiceUserDisplay;

class ServiceDisplayData
{
    public static function toWebPage(
        object $services,
         ?string $morph = null)
    {
        return 
        $services->through(
            fn ($service) => 
            ServiceClientDisplay::data($service, $morph));
    }

    public static function collectionToWebPage($services, ?string $morph = null)
    {
        return
         $services->map(
            fn ($service) => 
            ServiceClientDisplay::data($service, $morph));
    }

    public static function toOwnerDisplay($services)
    {
        return
         $services->through(
            fn ($service) => 
            ServiceUserDisplay::data($service));
    }
}
