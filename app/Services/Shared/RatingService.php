<?php

namespace App\Services\Shared;

use App\Actions\Shared\Rating\AddRating;
use App\Models\Product\Product;

class RatingService
{
    public static function forProduct(object $request): void
    {
        $product = Product::find($request->product_id);
        AddRating::for_product($product, $request);
    }
}
