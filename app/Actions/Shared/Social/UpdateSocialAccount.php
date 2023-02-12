<?php

namespace App\Actions\Shared\Social;

class UpdateSocialAccount
{
    public static function handle(object $validated_request, object $social): void
    {
        $social->title = $validated_request->title;
        $social->value = $validated_request->value;
        $social->username = $validated_request->username;
        $social->save();
    }
}
