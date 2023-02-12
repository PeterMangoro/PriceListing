<?php

namespace App\View\Welcome\Product;

use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Product\ProductHandler;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeOwnerProductsProps extends BaseView
{
    public function __construct(public object $owner)
    {
        $this->owner = $owner;
    }

    public function products()
    {
        return ProductDisplayData::to_web_page(
            ProductHandler::get_paginated_products(
                $this->owner->products(),
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
