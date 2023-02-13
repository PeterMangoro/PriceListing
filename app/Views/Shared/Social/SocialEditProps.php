<?php

namespace App\Views\Shared\Social;

use App\DataObjects\Social\SocialForUpdate;
use App\Views\Shared\BaseView;

class SocialEditProps extends BaseView
{
    public function __construct(
        public object $social,
    ) {
        $this->social = SocialForUpdate::fromRequest($this->social);
    }

    public function social()
    {
        return $this->social;
    }
}
