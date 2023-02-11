<?php

namespace App\Actions\Shared\Social;

use Illuminate\Support\Facades\Auth;

class AddSocialAccount
{
    public static function handle(object $request): void
    {
        // dd($request);
        Auth::user()->socials()->create([
            'title' => $request->title,
            'username' => $request->username,
            'value' => $request->value,
        ]);
    }
}
