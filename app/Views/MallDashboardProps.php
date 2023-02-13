<?php

namespace App\Views;

use App\Actions\Dashboard\DashboardCountAction;
use App\Views\Shared\BaseView;

class MallDashboardProps extends BaseView
{
    public function counts()
    {
        return (new DashboardCountAction())->handle();
    }
}
