<?php

namespace App\Views\Welcome\Car;

use App\DataObjects\Car\CarDisplayData;
use App\Handlers\Car\CarHandler;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeOwnerCarsProps extends BaseView
{
    public function __construct(public object $owner)
    {
        $this->owner = $owner;
    }

    public function cars()
    {
        return CarDisplayData::toWebPage(
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
