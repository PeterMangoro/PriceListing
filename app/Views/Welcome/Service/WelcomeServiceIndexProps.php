<?php

namespace App\Views\Welcome\Service;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Welcome\WelcomeServiceHandler;
use App\Models\Categories\ServiceCategory;
use App\Models\Feature;
use App\Models\Popular;
use App\Models\Service;
use App\Models\Shared\Discount;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeServiceIndexProps extends BaseView
{
    public function services()
    {
        return ServiceDisplayData::toWebPage(
            WelcomeServiceHandler::get_all_services(
                new Service()
            )
        );
    }

    public function pool()
    {
        $pool = WelcomeServiceHandler::get_featured_services();

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

    // public function fashion_services()
    // {

    //     return WelcomeServiceHandler::get_grouped_services('fashion_&_uniforms');
    // }

    // public function electrical_services()
    // {
    //     return WelcomeServiceHandler::get_grouped_services('electrical');
    // }

    // public function health_services()
    // {
    //     return WelcomeServiceHandler::get_grouped_services('health');
    // }

    // public function hardware_services()
    // {
    //     return WelcomeServiceHandler::get_grouped_services('hardware');
    // }

    // public function agriculture_services()
    // {
    //     return WelcomeServiceHandler::get_grouped_services('agriculture');
    // }

    // public function baby_services()
    // {
    //     return WelcomeServiceHandler::get_grouped_services('baby_accessories');
    // }

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
