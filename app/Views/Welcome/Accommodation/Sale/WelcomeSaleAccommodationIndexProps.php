<?php

namespace App\Views\Welcome\Accommodation\Sale;

use App\Models\Accommodation;
use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\Models\Shared\Discount;
use App\Handlers\Shared\ModelHandler;
use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Accommodation\AccommodationDisplayData;



class WelcomeSaleAccommodationIndexProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Accommodation::whereActive()
            )
        );
    }

    public function pool()
    {
       $pool = ModelHandler::getUnPaginatedData(new Accommodation(),50)
        ->random(fn ($items) => min(20, count($items)));


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
