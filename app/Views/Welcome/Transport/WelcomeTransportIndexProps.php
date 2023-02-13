<?php

namespace App\Views\Welcome\Transport;

use App\DataObjects\Transport\TransportDisplayData;
use App\Handlers\Transport\TransportHandler;
use App\Models\Transport;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeTransportIndexProps extends BaseView
{
    public function transports()
    {
        return TransportDisplayData::toWebPage(
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
