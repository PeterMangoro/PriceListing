<?php

namespace App\Views\Welcome\Service;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ServiceCategory;
use App\Models\Service;
use App\Models\Shared\Discount;
use App\Models\Shared\Feature;
use App\Models\Shared\Popular;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeServiceIndexProps extends BaseView
{
    public function services()
    {
        return ServiceDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                new Service()
            )
        );
    }

    public function pool()
    {
        $pool = ModelHandler::getUnPaginatedData(new Service(), 50)
            ->random(fn ($items) => min(20, count($items)));

        $featured_services =
            GetFeaturedModels::withDisplayImageOfType(
                Feature::orderByRating()->limit(4),
                'Service'
            )->map(fn ($service) => [
                'latest_image' => collect($service)['featurable']['latest_image']['path'],
                'uuid' => $service->featurable->uuid,
            ]);

        $top_talks =
            GetFeaturedModels::withDisplayImageOfType(
                Popular::orderByPageVisits()->limit(4),
                'Service'
            )->map(fn ($service) => [
                'latest_image' => collect($service)['popularable']['latest_image']['path'],
                'uuid' => $service->popularable->uuid,
            ]);

        $discounted_services =
            GetFeaturedModels::withDisplayImageOfType(
                Discount::orderByExpDate()->limit(4),
                'Service'
            )->map(fn ($service) => [
                'latest_image' => collect($service)['discountable']['latest_image']['path'],
                'uuid' => $service->discountable->uuid,
            ]);
        // dd($featured_services);

        $recent_services = $pool->map(fn ($service) => $service)->sortByDesc('created_at')->take(4);

        // $top_talks = $pool->map(fn ($service) => $service)->sortByDesc('page_visits')->take(4);

        $top_selling = $pool->map(fn ($service) => $service)->random(fn ($items) => min(4, count($items)));

        $for_you = $pool->map(fn ($service) => $service)->random(fn ($items) => min(4, count($items)));

        return [

            'featured_services' => $featured_services,
            'recent_services' => $recent_services,
            'top_talks' => $top_talks,
            'discounted_services' => $discounted_services,
            'for_you' => $for_you,
        ];
    }

    public function category_types()
    {
        return CategoryTypeData::forDisplay(
            ModelHandler::getUnPaginatedData(
                new ServiceCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
