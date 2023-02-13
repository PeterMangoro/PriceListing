<?php

namespace App\ValueObjects;

use Illuminate\Support\Collection;

class Socials
{
    public static function from(?object $value): Collection
    {
        return $value->map(
            fn ($contact) => [
                'account' => $contact->title,
                'username' => $contact->username,
                'handle' => $contact->value,
            ]
        );
    }
}
