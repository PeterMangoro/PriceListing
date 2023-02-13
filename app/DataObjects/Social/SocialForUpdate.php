<?php

namespace App\DataObjects\Social;

class SocialForUpdate
{
    public function __construct(
        public readonly  string $account,
        public  readonly string $handle,
        public  readonly string $username
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
