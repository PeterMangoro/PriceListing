<?php

namespace App\Services\Shared;

use App\Actions\Shared\Discount\AddDiscount;

class DiscountService
{
    /**
     * @param array<int,int> $discount
     */
    public static function forModel(
        object $model,
        array $discount,
        string $type
    ): void {
        AddDiscount::forModel(
            $model,
            $discount,
            $type
        );
    }
}
