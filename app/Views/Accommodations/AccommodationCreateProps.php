<?php

namespace App\Views\Accommodations;

use App\View\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\AccommodationCategory;





class AccommodationCreateProps extends BaseView
{
    public function category_types()
    {
        return ModelHandler::getUnPaginatedData(
            new AccommodationCategory()
        )
            ->sortBy('type')
            ->groupBy('type');
    }
}
