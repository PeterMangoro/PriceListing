<?php

namespace App\Views\Socials;

use App\DataObjects\Social\SocialForUpdate;
use App\View\Shared\BaseView;

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
