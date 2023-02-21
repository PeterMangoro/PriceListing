<?php

namespace App\DataObjects\Social\Partials;

class SocialClientDisplay
{
    public function __construct(
        public readonly string $account,
        public readonly string $handle,
        public readonly ?string $username,
    ) {
    }

    public static function data(object $social)
    {
        return new self(
            $social->account,
            $social->handle,
            $social->username,
        );
    }
}
