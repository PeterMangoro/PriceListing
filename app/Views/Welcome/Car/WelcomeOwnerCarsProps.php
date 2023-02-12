<?php

namespace App\View\Welcome\Car;

use App\DataObjects\Car\CarDisplayData;
use App\Handlers\Car\CarHandler;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeOwnerCarsProps extends BaseView
{
    public function __construct(public object $owner)
    {
        $this->owner = $owner;
    }

    public function cars()
    {
        return CarDisplayData::to_web_page(
            CarHandler::get_paginated_cars(
                $this->owner->cars(),
                18
            )
        );
    }

    public function owner()
    {
        return [
            'username' => $this->owner->username,
            'name' => $this->owner->name,
        ];
    }

    public function filters()
    {
        return Filters::filters();
    }
}
