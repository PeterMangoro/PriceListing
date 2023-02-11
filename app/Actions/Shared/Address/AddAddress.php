<?php

namespace App\Actions\Shared\Address;

use Illuminate\Support\Arr;

class AddAddress
{
    /**
     * @param array<string , string> $location
     */
    public static function handle(
        object $model,
        array $location
    ): void {
        $city_slug = str($location['city'])->slug();
        $new_location = Arr::add(
            $location,
            'city_slug',
            $city_slug
        );

        $model->address()->create($new_location);
    }
}
