<?php

namespace App\Actions\Shared\Social;

use Illuminate\Support\Facades\Auth;

class AddSocialAccount
{
    public static function handle(object $validated_request): void
    {
        Auth::user()->socials()->create([
            'title' => $validated_request->title,
            'username' => $validated_request->username,
            'value' => $validated_request->value,
        ]);
    }
}
