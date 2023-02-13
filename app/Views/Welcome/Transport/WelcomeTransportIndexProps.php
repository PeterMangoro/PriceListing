<?php

namespace App\Views\Welcome\Transport;

use App\DataObjects\Transport\TransportDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Car\Transport;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

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
