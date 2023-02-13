<?php

namespace App\Views\Welcome\Car;

use App\Models\Car\Car;
use App\Views\Shared\Filters;
use App\Models\Shared\Feature;
use App\Models\Shared\Popular;
use App\Views\Shared\BaseView;
use App\Models\Shared\Discount;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\CarCategory;
use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Actions\Shared\Feature\GetFeaturedModels;



class WelcomeCarIndexProps extends BaseView
{
    public function cars()
    {
        return CarDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                new Car()
            )
        );
    }

    public function pool()
    {
       $pool = ModelHandler::getUnPaginatedData(new Car(),50)
        ->random(fn ($items) => min(20, count($items)));
;

        $featured_cars =
            GetFeaturedModels::withDisplayImageOfType(
                Feature::orderByRating()->limit(4),
                'Car'
            )->map(fn ($car) => [
                'latest_image' => collect($car)['featurable']['latest_image']['path'],
                'uuid' => $car->featurable->uuid,
            ]);

        $top_talks =
            GetFeaturedModels::withDisplayImageOfType(
                Popular::orderByPageVisits()->limit(4),
                'Car'
            )->map(fn ($car) => [
                'latest_image' => collect($car)['popularable']['latest_image']['path'],
                'uuid' => $car->popularable->uuid,
            ]);

        $discounted_cars =
            GetFeaturedModels::withDisplayImageOfType(
                Discount::orderByExpDate()->limit(4),
                'Car'
            )->map(fn ($car) => [
                'latest_image' => collect($car)['discountable']['latest_image']['path'],
                'uuid' => $car->discountable->uuid,
            ]);
        // dd($featured_cars);

        $recent_cars = $pool->map(fn ($car) => $car)->sortByDesc('created_at')->take(4);

        // $top_talks = $pool->map(fn ($car) => $car)->sortByDesc('page_visits')->take(4);

        $top_selling = $pool->map(fn ($car) => $car)->random(fn ($items) => min(4, count($items)));

        $for_you = $pool->map(fn ($car) => $car)->random(fn ($items) => min(4, count($items)));

        return [

            'featured_cars' => $featured_cars,
            'recent_cars' => $recent_cars,
            'top_talks' => $top_talks,
            'discounted_cars' => $discounted_cars,
            'for_you' => $for_you,
        ];
    }
    // public function fashion_cars()
    // {

    //     return WelcomeCarHandler::get_grouped_cars('fashion_&_uniforms');
    // }

    // public function electrical_cars()
    // {
    //     return WelcomeCarHandler::get_grouped_cars('electrical');
    // }

    // public function health_cars()
    // {
    //     return WelcomeCarHandler::get_grouped_cars('health');
    // }

    // public function hardware_cars()
    // {
    //     return WelcomeCarHandler::get_grouped_cars('hardware');
    // }

    // public function agriculture_cars()
    // {
    //     return WelcomeCarHandler::get_grouped_cars('agriculture');
    // }

    // public function baby_cars()
    // {
    //     return WelcomeCarHandler::get_grouped_cars('baby_accessories');
    // }

    public function category_types()
    {
        return CategoryTypeData::forDisplay(
            ModelHandler::getUnPaginatedData(
                new CarCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
