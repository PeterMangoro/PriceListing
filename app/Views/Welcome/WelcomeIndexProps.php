<?php

namespace App\View\Welcome;

use App\Handlers\Welcome\WelcomeHandler;
use App\View\Shared\BaseView;

class WelcomeIndexProps extends BaseView
{
    public function branches()
    {
        return WelcomeHandler::get_branches();
    }
}
