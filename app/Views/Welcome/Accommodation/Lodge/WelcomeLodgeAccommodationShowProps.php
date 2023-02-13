<?php

namespace App\Views\Welcome\Accommodation\Sale;

use App\DataObjects\Accommodation\AccommodationDetailData;
use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\Handlers\Accommodation\AccommodationHandler;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Model\ModelHandler;
use App\Models\Accommodation;
use App\Models\Categories\AccommodationCategory;
use App\Views\Shared\BaseView;

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
            CategoryHandler::get_category(
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
