<?php

namespace App\DataObjects\Social;

class SocialCreateData
{
    public function __construct(
        public readonly string $title,
        public readonly string $value,
        public readonly string $username
    ) {
    }

    public static function fromRequest($request)
    {
        return new self(
            $request->account,
            $request->handle,
            $request->username,
        );
    }
}
