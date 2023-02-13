<?php

namespace App\Views\Welcome\Accommodation\Lodge;

use App\Models\Accommodation;
use App\Views\Shared\Filters;
use App\Models\Shared\Feature;
use App\Models\Shared\Popular;
use App\Views\Shared\BaseView;
use App\Models\Shared\Discount;
use App\Handlers\Shared\ModelHandler;
use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Accommodation\AccommodationDisplayData;

class WelcomeLodgeAccommodationIndexProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Accommodation::forLodges()
            )
        );
    }

    public function pool()
    {
        $pool = ModelHandler::getUnPaginatedData(new Accommodation(),50)
        ->random(fn ($items) => min(20, count($items)));

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
