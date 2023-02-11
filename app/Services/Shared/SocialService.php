<?php

namespace App\Services\Shared;

use App\Actions\Shared\Social\AddSocialAccount;
use App\Actions\Shared\Social\UpdateSocialAccount;

class SocialService
{
    public static function create(object $product): void
    {
        AddSocialAccount::handle($product);
    }

    public static function update(
        object $request,
        object $product
    ): void {
        UpdateSocialAccount::handle($request, $product);
    }
}
