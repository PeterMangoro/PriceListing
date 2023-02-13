<?php

namespace App\Views\Welcome\Accommodation\Rental;

use App\Models\Accommodation;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Accommodation\AccommodationDetailData;
use App\DataObjects\Accommodation\AccommodationDisplayData;


class WelcomeRentalAccommodationShowProps extends BaseView
{
    public function __construct(
        public string $uuid,
        public ?object $accommodation = null,
        public ?string $city = null,
    ) {
        $this->uuid = $uuid;
        $this->accommodation =
            ModelHandler::getModelForDisplay(
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
        return AccommodationDisplayData::collectionToWebPage(
            ModelHandler::getUnPaginatedData(
                Accommodation::fromSameCity($this->accommodation->address->city)
                    ->dontInclude($this->accommodation->id)
                    ->withAddress()
                    ->forRental(),
                9
            )
        );
    }

    public function owner_accommodations()
    {
        return AccommodationDisplayData::collectionToWebPage(
            ModelHandler::getUnPaginatedData(
                Accommodation::belongsToOwner($this->accommodation->user->id)
                    ->dontInclude($this->accommodation->id)
                    ->withAddress(),
                9
            )
        );
    }
}
