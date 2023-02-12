<?php

namespace App\Views;

use App\Actions\Mall\Dashboard\DashboardCountAction;
use App\View\Shared\BaseView;

class MallDashboardProps extends BaseView
{
    public function counts()
    {
        return (new DashboardCountAction())->handle();
    }
}
