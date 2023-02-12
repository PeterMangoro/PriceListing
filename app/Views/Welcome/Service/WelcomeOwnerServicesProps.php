<?php

namespace App\View\Welcome\Service;

use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Service\ServiceHandler;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeOwnerServicesProps extends BaseView
{
    public function __construct(object $owner)
    {
        $this->owner = $owner;
    }

    public function services()
    {
        return ServiceDisplayData::to_web_page(
            ServiceHandler::get_paginated_services(
                $this->owner->services(),
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
