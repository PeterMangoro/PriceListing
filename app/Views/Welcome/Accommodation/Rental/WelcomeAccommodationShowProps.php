<?php

namespace App\View\Welcome\Accommodation\Rental;

use App\DataObjects\Accommodation\AccommodationDetailData;
use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\Handlers\Accommodation\AccommodationHandler;
use App\Handlers\Model\ModelHandler;
use App\Models\Accommodation;
use App\View\Shared\BaseView;

class WelcomeAccommodationShowProps extends BaseView
{
    public function __construct(
        public string $uuid,
        public ?object $accommodation = null,
    ) {
        $this->uuid = $uuid;
        $this->accommodation =
            ModelHandler::get_model_for_detailed_display(
                new Accommodation(),
                $uuid
            );
    }

    public function accommodation()
    {
        return AccommodationDetailData::toWebPage($this->accommodation);
    }

    public function similar_accommodations()
    {
        return AccommodationDisplayData::collection_to_web_page(
            AccommodationHandler::get_unpaginated_accommodations(
                Accommodation::fromSameCity($this->accommodation->address->city)
                    ->dontInclude($this->accommodation->id)
                    ->whereActive()
                    ->withAddress(),
                9
            )
        );
    }

    public function owner_accommodations()
    {
        return AccommodationDisplayData::collection_to_web_page(
            AccommodationHandler::get_unpaginated_accommodations(
                Accommodation::belongsToOwner($this->accommodation->user->id)
                    ->dontInclude($this->accommodation->id)
                    ->withAddress(),
                9
            )
        );
    }
}
