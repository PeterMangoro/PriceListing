<?php

namespace App\Views\Accommodations;

use App\Models\Categories\AccommodationCategory;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;

class AccommodationCreateProps extends BaseView
{
    public function category_types()
    {
        return Categories::getAllCategories(
            new AccommodationCategory()
        )
            ->sortBy('type')
            ->groupBy('type');
    }
}
