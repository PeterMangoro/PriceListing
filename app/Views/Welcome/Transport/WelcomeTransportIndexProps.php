<?php

namespace App\Views\Welcome\Transport;

use App\Models\Car\Transport;
use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Transport\TransportDisplayData;

class WelcomeTransportIndexProps extends BaseView
{
    public function transports()
    {
        return TransportDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
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
