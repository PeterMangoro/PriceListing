<?php

namespace App\Handlers\Shared;

use App\Services\Shared\RatingService;

class RatingHandler
{
    public static function forProduct(object $request)
    {
        RatingService::forProduct($request);
    }
}
