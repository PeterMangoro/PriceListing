<?php

namespace App\View\Welcome\Transport;

use App\DataObjects\Transport\TransportDetailData;
use App\Handlers\Model\ModelHandler;
use App\Handlers\Transport\TransportHandler;
use App\Models\Mall\Transport;
use App\View\Shared\BaseView;

class WelcomeTransportShowProps extends BaseView
{
    public function __construct(
        public string $uuid,
        public ?object $transport = null,
        public ?string $destination = null,
        public ?string $departure = null,
    ) {
        $this->uuid = $uuid;
        $this->transport = ModelHandler::get_transport_for_detailed_display(new Transport(), $uuid);
        $this->destination = $this->transport->destination;
        $this->departure = $this->transport->departure;
    }

    public function transport()
    {
        return TransportDetailData::to_web_page($this->transport);
        // return $this->transport;
    }

    public function similar_transports()
    {
        return TransportHandler::get_unpaginated_transports(
            Transport::travelingSameRoute($this->departure, $this->destination)
                ->dontInclude($this->transport->id),
            8
        );
    }

    public function owner_transports()
    {
        return TransportHandler::get_unpaginated_transports(
            Transport::belongsToOwner($this->transport->user->id)
                ->dontInclude($this->transport->id),
            8
        );
    }
}
