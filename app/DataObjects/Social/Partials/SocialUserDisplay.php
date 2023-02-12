<?php

namespace App\DataObjects\Social\Partials;

class SocialUserDisplay
{
    public function __construct(
        public readonly  int $id,
        public  readonly string $account,
        public  readonly string $handle,
        public  readonly string $username,
    ) {
        
    }

    public static function data(object $social)
    {
        
        return new self(
            $social->id,
            $social->title,
            $social->value,
            $social->username,
        );
    }
}
