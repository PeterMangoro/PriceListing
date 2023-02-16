<?php

namespace App\Actions\Shared\Rating;

use Illuminate\Support\Facades\Auth;

class AddRating
{
    public static function forModel(object $Model,string $model_name, object $request): void
    {
        $user = Auth::user()->id;
        $Model->ratings()->updateOrCreate(
            [
                'ratingable_id' => $request->product_id,
                'ratingable_type' => "App\\Models\\".$model_name,
                'user_id' => $user,
            ],

            // then update
            [
                'user_id' => $user,
                'ratingable_id' => $request->product_id,
                'ratingable_type' => "App\\Models\\".$model_name,
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]
        );
    }
}
