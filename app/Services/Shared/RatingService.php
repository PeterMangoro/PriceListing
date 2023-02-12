<?php

namespace App\Services\Shared;

use App\Models\Product;
use App\Actions\Shared\Rating\AddRating;



class RatingService
{
    public static function forProduct(object $request): void
    {
        $product = Product::find($request->product_id);
        AddRating::forProduct($product, $request);
    }
}
