<?php

namespace App\ValueObjects;

class Values
{
    public function __construct(
        public array $values,
    ) {
        $this->values = $values;
    }

    public static function fromString(?string $values): array
    {
        return array_filter(
            explode('*', $values)
        );
    }
}
