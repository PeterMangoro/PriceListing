<?php

namespace App\Views\Welcome\Car;

use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Shared\ModelHandler;
use App\Models\Car\Car;
use App\Models\Categories\CarCategory;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeCarIndexProps extends BaseView
{
    public function cars()
    {
        return CarDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Car::selectMinAttributes()
                    ->IncludeCarDetail()
                    ->whereActive()
            )
        );
    }

    // public function pool()
    // {
    //     $pool = ModelHandler::getUnPaginatedData(new Car(), 50)
    //         ->random(fn ($items) => min(20, count($items)));

    //     $featured_cars =
    //         GetFeaturedModels::withDisplayImageOfType(
    //             Feature::orderByRating()->limit(4),
    //             'Car'
    //         )->map(fn ($car) => [
    //             'latest_image' => collect($car)['featurable']['latest_image']['path'],
    //             'uuid' => $car->featurable->uuid,
    //         ]);

    //     $top_talks =
    //         GetFeaturedModels::withDisplayImageOfType(
    //             Popular::orderByPageVisits()->limit(4),
    //             'Car'
    //         )->map(fn ($car) => [
    //             'latest_image' => collect($car)['popularable']['latest_image']['path'],
    //             'uuid' => $car->popularable->uuid,
    //         ]);

    //     $discounted_cars =
    //         GetFeaturedModels::withDisplayImageOfType(
    //             Discount::orderByExpDate()->limit(4),
    //             'Car'
    //         )->map(fn ($car) => [
    //             'latest_image' => collect($car)['discountable']['latest_image']['path'],
    //             'uuid' => $car->discountable->uuid,
    //         ]);
    //     // dd($featured_cars);

    //     $recent_cars = $pool->map(fn ($car) => $car)->sortByDesc('created_at')->take(4);

    //     // $top_talks = $pool->map(fn ($car) => $car)->sortByDesc('page_visits')->take(4);

    //     $top_selling = $pool->map(fn ($car) => $car)->random(fn ($items) => min(4, count($items)));

    //     $for_you = $pool->map(fn ($car) => $car)->random(fn ($items) => min(4, count($items)));

    //     return [

    //         'featured_cars' => $featured_cars,
    //         'recent_cars' => $recent_cars,
    //         'top_talks' => $top_talks,
    //         'discounted_cars' => $discounted_cars,
    //         'for_you' => $for_you,
    //     ];
    // }

    public function category_types()
    {
        return CategoryTypeData::forDisplay(
            CategoryHandler::getCategoryTypes(
                new CarCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
