<?php

namespace App\Views;

use App\Actions\Dashboard\DashboardCountAction;
use App\View\Shared\BaseView;

class MallDashboardProps extends BaseView
{
    public function counts()
    {
        return (new DashboardCountAction())->handle();
    }
}
