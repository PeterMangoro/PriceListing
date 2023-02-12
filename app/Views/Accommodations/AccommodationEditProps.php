<?php

namespace App\Views\Accommodations;

use App\Models\Accommodation;
use App\View\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\AccommodationCategory;
use App\DataObjects\Accommodation\Partials\AccommodationForUpdate;

class AccommodationEditProps extends BaseView
{
    public function __construct(
        public string $uuid,
        public ?object $accommodation = null,
        public ?object $categories = null,
    ) {
        $this->uuid = $uuid;
        $this->accommodation = AccommodationForUpdate::from(
            ModelHandler::getModelForEdit(new Accommodation(),$this->uuid));
        $this->categories = $this->accommodation->categories;
    }

    public function accommodation()
    {
        return $this->accommodation;
    }

 

    public function category_types()
    {
        return ModelHandler::getUnPaginatedData(
            new AccommodationCategory()
        )
            ->sortBy('type')
            ->groupBy('type');
    }
}
