<?php

namespace App\Services\Shared;

use App\Actions\Shared\Address\AddAddress;
use App\Actions\Shared\Address\UpdateAddress;

class AddressService
{
    /**
     * @param array<string , string> $location
     */
    public static function addForModel(
        object $model,
        array $location
    ): void {
        AddAddress::handle($model, $location);
    }

    /**
     * @param array<string , string> $location
     */
    public static function updateForModel(
        object $model,
        array $location
    ): void {
        UpdateAddress::handle($model, $location);
    }
}
