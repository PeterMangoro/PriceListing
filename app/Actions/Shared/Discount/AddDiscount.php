<?php

namespace App\Actions\Shared\Discount;

class AddDiscount
{
    /**
     * @param array<int,int> $discount
     */
    public static function forModel(
        object $model,
        array $discount,
        string $type
    ): void {
        $model->discount()->updateOrCreate(
            [
                'discountable_type' => "'App\Models\Mall\'.{$type}",
                'discountable_id' => $model->id,
            ],
            $discount
        );
    }
}
