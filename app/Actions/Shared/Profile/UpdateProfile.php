<?php

namespace App\Actions\Shared\Profile;

use App\Models\Shared\Profile;
use Illuminate\Support\Facades\Auth;

class UpdateProfile
{
    public static function information(object $request): void
    {
        Profile::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
            ],
            [
                'user_id' => Auth::user()->id,
                'mission' => $request->mission,
                'vision' => $request->vision,
                'history' => $request->history,
                'company_values' => $request->values,

            ]
        );
    }
}
