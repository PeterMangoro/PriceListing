<?php

namespace App\Handlers\Shared;

use App\Services\Shared\RatingService;

class RatingHandler
{
    public static function forModel(object $request,object $model,string $model_name)
    {
        RatingService::forModel($request,$model,$model_name);
    }
}
