<?php

namespace App\DataObjects\Social;

use App\DataObjects\Social\Partials\SocialClientDisplay;
use App\DataObjects\Social\Partials\SocialUserDisplay;

class SocialDisplayData
{
    public static function toWebPage(
        object $socials,
        ?string $morph = null
    ) {
        return $socials->through(
            fn ($social) => SocialClientDisplay::data($social, $morph)
        );
    }

    public static function collectionToWebPage(
        $socials,
        ?string $morph = null
    ) {
        return $socials->map(
            fn ($social) => SocialClientDisplay::data($social, $morph)
        );
    }

    public static function toOwnerDisplay($socials)
    {
        return $socials->through(
            fn ($social) => SocialUserDisplay::data($social)
        );
    }
}
