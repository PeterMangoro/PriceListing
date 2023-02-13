<?php

namespace App\Views\Welcome\Accommodation\Sale;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\Handlers\Welcome\WelcomeAccommodationHandler;
use App\Models\Accommodation;
use App\Models\Shared\Discount;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeSaleAccommodationIndexProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            WelcomeAccommodationHandler::get_paginated_display_accommodations(
                Accommodation::whereActive()
            )
        );
    }

    public function pool()
    {
        $pool = WelcomeAccommodationHandler::get_featured_accommodations();

        $discounted_accommodations =
            GetFeaturedModels::withDisplayImageOfType(
                Discount::orderByExpDate()->limit(4),
                'Accommodation'
            )->map(fn ($accommodation) => [
                'latest_image' => collect($accommodation)['discountable']['latest_image']['path'],
                'uuid' => $accommodation->discountable->uuid,
            ]);
        $recent_accommodations = $pool->map(fn ($accommodation) => $accommodation)->sortByDesc('created_at')->take(4);

        return [
            'recent_accommodations' => $recent_accommodations,
            'discounted_accommodations' => $discounted_accommodations,
        ];
    }

    public function filters()
    {
        return Filters::filters();
    }
}
