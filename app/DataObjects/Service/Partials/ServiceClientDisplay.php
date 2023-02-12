<?php

namespace App\DataObjects\Service\Partials;

class ServiceClientDisplay
{
    public function __construct(
        public readonly string $title,
        public readonly string $uuid,
        public readonly string $latest_image,
    ) {
        
    }
    public static function data(
        object $service, 
        ?string $morph = null)
    {
        return new self(
            $service->$morph->title ?? $service->title,
            $service->uuid ?? $service->$morph->uuid,
            collect($service)['latest_image']['path'] ??
             collect($service)[$morph]['latest_image']['path'] ?? 
             '/storage/no-thumbnail/No_image_available.svg',
        );
    }
}
