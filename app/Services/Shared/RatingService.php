<?php

namespace App\Services\Shared;

use App\Actions\Shared\Rating\AddRating;
use App\Models\Product;

class RatingService
{
    public static function forModel(object $request,object $model,string $model_name): void
    {
        $Model = $model->find($request->product_id);
        AddRating::forModel($Model,$model_name, $request);
    }
}
