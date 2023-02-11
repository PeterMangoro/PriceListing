<?php

namespace App\Services\Shared;

use App\Actions\Shared\Price\AddPrice;

class PriceService
{
    public static function addPriceForModel(
        object $model,
        float $price
    ): void {
        AddPrice::forModel($model, $price);
    }
}
