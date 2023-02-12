<?php

namespace App\View\Welcome\Transport;

use App\Handlers\Transport\TransportHandler;
use App\Models\Mall\Transport;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeTransportTripProps extends BaseView
{
    public function __construct(
        public string $departure,
        public string $destination
    ) {
        $this->departure = $departure;
        $this->destination = $destination;
    }

    public function transports()
    {
        return TransportHandler::get_paginated_transports(Transport::travelingSameRoute($this->departure, $this->destination), 18);
    }

    public function trip()
    {
        return [
            'departure' => $this->departure,
            'destination' => $this->destination,
        ];
    }

    public function filters()
    {
        return Filters::transport_filters();
    }
}
