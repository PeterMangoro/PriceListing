<?php

namespace App\Actions\Shared\Social;

class UpdateSocialAccount
{
    public static function handle(object $request, object $social): void
    {
        $social->title = $request->title;
        $social->value = $request->value;
        $social->username = $request->username;
        $social->save();
    }
}
