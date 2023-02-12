<?php

namespace App\View\Welcome\Transport;

use App\DataObjects\Transport\TransportDisplayData;
use App\Handlers\Transport\TransportHandler;
use App\Models\Mall\Transport;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeTransportIndexProps extends BaseView
{
    public function transports()
    {
        return TransportDisplayData::to_web_page(
            TransportHandler::get_paginated_transports(
                new Transport(),
                18
            )
        );
    }

    public function filters()
    {
        return Filters::transport_filters();
    }
}
