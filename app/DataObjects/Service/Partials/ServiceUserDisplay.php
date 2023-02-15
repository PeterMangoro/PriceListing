<?php

namespace App\DataObjects\Service\Partials;

use App\ValueObjects\AvgRating;
use App\ValueObjects\SaleStatus;

class ServiceUserDisplay
{
    public function __construct(
        public readonly  string $latest_image,
        public  readonly string $title,
        public  readonly string $uuid,
        public  readonly array $detail,
        public readonly  string $status,
        public readonly  string $ratings,
        public readonly  int $id,
    ) {
    }
    public static function data($service)
    {
        return new self(
            collect($service)['latest_image']['path'] ??
            collect($service)['featurable']['latest_image']['path'] ??
             '/storage/no-thumbnail/No_image_available.svg',
            $service->title,
            $service->uuid,
            $service->detail,
            SaleStatus::from($service->sale_status),
            AvgRating::of($service->ratings),
            $service->id
        );
    }
}
