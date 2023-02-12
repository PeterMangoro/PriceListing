<?php

namespace App\DataObjects\Address\Partials;

class AddressForUpdate
{
    public function __construct(
        public readonly string $street,
        public readonly ?string $town,
        public readonly string $city,
        public readonly ?string $country,
    ) {
        
    }

    public static function from(object $address)
    {
        return new self(
            $address->street,
            $address->town,
            $address->city,
            $address->country,
        );
    }
}
