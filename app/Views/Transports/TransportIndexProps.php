<?php

namespace App\Views\Transports;

use App\Handlers\Transport\TransportHandler;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class TransportIndexProps extends BaseView
{
    public function transports()
    {
        return TransportHandler::get_user_transports();
    }

    public function filters()
    {
        return Filters::filters();
    }
}
