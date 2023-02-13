<?php

namespace App\Views\Transports;

use App\Handlers\Shared\ModelHandler;
use App\Handlers\Transport\TransportHandler;
use App\Models\Car\Transport;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class TransportIndexProps extends BaseView
{
    public function transports()
    {
        return ModelHandler::getPaginatedData(Transport::belongsToAuthUser());
    }

    public function filters()
    {
        return Filters::filters();
    }
}
