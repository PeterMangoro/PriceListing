<?php

namespace App\Actions\Shared\Rating;

use Illuminate\Support\Facades\Auth;

class AddRating
{
    public static function forProduct(object $product, object $request): void
    {
        $user = Auth::user()->id;
        $product->ratings()->updateOrCreate(
            [
                'ratingable_id' => $request->product_id,
                'ratingable_type' => 'App\Models\Mall\Product',
                'user_id' => $user,
            ],
            // then update
            [
                'user_id' => $user,
                'ratingable_id' => $request->product_id,
                'ratingable_type' => 'App\Models\Mall\Product',
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]
        );
    }
}
