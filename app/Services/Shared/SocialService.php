<?php

namespace App\Services\Shared;

use App\Actions\Shared\Social\AddSocialAccount;
use App\Actions\Shared\Social\UpdateSocialAccount;

class SocialService
{
    public static function create(object $validated_request): void
    {
        AddSocialAccount::handle($validated_request);
    }

    public static function update(
        object $validated_request,
        object $social
    ): void {
        UpdateSocialAccount::handle($validated_request, $social);
    }
}
