<?php

namespace App\Actions\Shared\Address;

class UpdateAddress
{
    /**
     * @param array<string , string> $location
     */
    public static function handle(
        object $model,
        array $location
    ): void {
        $model->address()->update($location);
    }
}
