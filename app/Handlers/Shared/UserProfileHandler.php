<?php

namespace App\Handlers\Shared;

use App\Services\Shared\UserProfileService;
use App\Http\Requests\Shared\Profile\ProfileUpdateRequest;



class UserProfileHandler
{
    public static function update(ProfileUpdateRequest $request)
    {
        UserProfileService::update($request);
    }
}
