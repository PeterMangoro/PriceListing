<?php

namespace App\ValueObjects;

class Address
{
    public function __construct(
        public readonly  ?string $country,
        public readonly  ?string $city,
        public  readonly ?string $town,
        public  readonly ?string $street,
    ) {
       
    }

    public static function from(?object $value = null)
    {
       
        return new self(
            $value->country ?? null,
            $value->city ?? null,
            $value->town ?? null,
            $value->street ?? null,
        );
    }

   
}
