<?php

namespace App\Actions\Shared\Price;

class AddPrice
{
    public static function forModel(
        object $model,
        float $price
    ): void {
        $model->prices()->create([
            'amount' => $price,

        ]);
    }
}
