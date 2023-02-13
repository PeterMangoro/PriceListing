<?php

namespace App\Handlers\Shared;

use App\Http\Requests\Shared\Profile\ProfileUpdateRequest;
use App\Services\Shared\UserProfileService;

class UserProfileHandler
{
    public static function update(ProfileUpdateRequest $request)
    {
        UserProfileService::update($request);
    }
}
