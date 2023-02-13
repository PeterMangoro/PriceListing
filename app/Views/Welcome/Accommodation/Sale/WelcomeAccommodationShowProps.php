<?php

namespace App\Views\Welcome\Accommodation\Sale;

use App\DataObjects\Accommodation\AccommodationDetailData;
use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Accommodation;
use App\Views\Shared\BaseView;

class WelcomeAccommodationShowProps extends BaseView
{
    public function __construct(
        public string $uuid,
        public ?object $accommodation = null,
        public ?object $category = null,
    ) {
        $this->uuid = $uuid;
        $this->accommodation =
            ModelHandler::getModelForDisplay(
                new Accommodation(),
                $uuid
            );
        // $this->category =
        //     CategoryHandler::get_category(
        //         AccommodationCategory::whichHasAccommodation($this->accommodation->id)
        //     );
    }

    public function accommodation()
    {
        return AccommodationDetailData::toWebPage($this->accommodation);
    }

    // public function category_type()
    // {
    //     return CategoryType::from($this->category->type);
    // }

    public function similar_accommodations()
    {
        return AccommodationDisplayData::collectionToWebPage(
            ModelHandler::getUnPaginatedData(
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
