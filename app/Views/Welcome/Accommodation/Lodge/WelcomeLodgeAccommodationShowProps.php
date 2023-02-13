<?php

namespace App\Views\Welcome\Accommodation\Sale;

use App\Models\Accommodation;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\AccommodationCategory;
use App\DataObjects\Accommodation\AccommodationDetailData;
use App\DataObjects\Accommodation\AccommodationDisplayData;



class WelcomeLodgeAccommodationShowProps extends BaseView
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
        $this->city =
            ModelHandler::getUnPaginatedData(
                AccommodationCategory::whichHasAccommodation($this->accommodation->id)
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
                    ->whereActive(),
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
