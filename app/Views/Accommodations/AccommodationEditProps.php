<?php

namespace App\Views\Accommodations;

use App\DataObjects\Accommodation\Partials\AccommodationForUpdate;
use App\Handlers\Shared\ModelHandler;
use App\Models\Accommodation;
use App\Models\Categories\AccommodationCategory;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;

class AccommodationEditProps extends BaseView
{
    public function __construct(
        public string $uuid,
        public ?object $accommodation = null,
        public ?object $categories = null,
    ) {
        $this->uuid = $uuid;
        $this->accommodation = AccommodationForUpdate::from(
            ModelHandler::getModelForEdit(new Accommodation(), $this->uuid)
        );
        $this->categories = $this->accommodation->categories;
    }

    public function accommodation()
    {
        return $this->accommodation;
    }

    public function category_types()
    {
        return Categories::getAllCategories(
            new AccommodationCategory()
        )
            ->sortBy('type')
            ->groupBy('type');
    }
}
