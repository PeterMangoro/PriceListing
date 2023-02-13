<?php

namespace App\Views\Welcome\Transport;

use App\Models\Car\Transport;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\Handlers\Transport\TransportHandler;
use App\DataObjects\Transport\TransportDetailData;



class WelcomeTransportShowProps extends BaseView
{
    public function __construct(
        public string $uuid,
        public ?object $transport = null,
        public ?string $destination = null,
        public ?string $departure = null,
    ) {
        $this->uuid = $uuid;
        $this->transport = ModelHandler::getModelForDisplay(new Transport(), $uuid);
        $this->destination = $this->transport->destination;
        $this->departure = $this->transport->departure;
    }

    public function transport()
    {
        return TransportDetailData::toWebPage($this->transport);
        // return $this->transport;
    }

    public function similar_transports()
    {
        return ModelHandler::getUnPaginatedData(
            Transport::travelingSameRoute($this->departure, $this->destination)
                ->dontInclude($this->transport->id),
            8
        );
    }

    public function owner_transports()
    {
        return ModelHandler::getUnPaginatedData(
            Transport::belongsToOwner($this->transport->user->id)
                ->dontInclude($this->transport->id),
            8
        );
    }
}
