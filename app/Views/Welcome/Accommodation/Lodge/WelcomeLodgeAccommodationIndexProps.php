<?php

namespace App\View\Welcome\Accommodation\Lodge;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\Handlers\Welcome\WelcomeAccommodationHandler;
use App\Models\Accommodation;
use App\Models\Feature;
use App\Models\Popular;
use App\Models\Shared\Discount;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeLodgeAccommodationIndexProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            WelcomeAccommodationHandler::get_paginated_display_accommodations(
                Accommodation::forLodges()
            )
        );
    }

    public function pool()
    {
        $pool = WelcomeAccommodationHandler::get_featured_accommodations();

        $featured_accommodations =
            GetFeaturedModels::withDisplayImageOfType(
                Feature::orderByRating()->limit(4),
                'Accommodation',
                9
            )->map(fn ($accommodation) => [
                'latest_image' => collect($accommodation)['featurable']['latest_image']['path'],
                'uuid' => $accommodation->featurable->uuid,
            ]);

        $top_talks =
            GetFeaturedModels::withDisplayImageOfType(
                Popular::orderByPageVisits()->limit(4),
                'Accommodation'
            )->map(fn ($accommodation) => [
                'latest_image' => collect($accommodation)['popularable']['latest_image']['path'],
                'uuid' => $accommodation->popularable->uuid,
            ]);

        $discounted_accommodations =
            GetFeaturedModels::withDisplayImageOfType(
                Discount::orderByExpDate()->limit(4)->forLodges()->withActiveDiscountPrice(),
                'Accommodation'
            )->map(fn ($accommodation) => [
                'latest_image' => collect($accommodation)['discountable']['latest_image']['path'],
                'uuid' => $accommodation->discountable->uuid,
            ]);
        // dd($featured_accommodations);

        $recent_accommodations = $pool->map(fn ($accommodation) => $accommodation)->sortByDesc('created_at')->take(4);

        // $top_talks = $pool->map(fn ($accommodation) => $accommodation)->sortByDesc('page_visits')->take(4);

        $top_selling = $pool->map(fn ($accommodation) => $accommodation)->random(fn ($items) => min(4, count($items)));

        $for_you = $pool->map(fn ($accommodation) => $accommodation)->random(fn ($items) => min(4, count($items)));

        return [

            'featured_accommodations' => $featured_accommodations,
            'recent_accommodations' => $recent_accommodations,
            'top_talks' => $top_talks,
            'discounted_accommodations' => $discounted_accommodations,
            'for_you' => $for_you,
        ];
    }

    public function filters()
    {
        return Filters::filters();
    }
}
