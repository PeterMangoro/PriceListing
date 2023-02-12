<?php

namespace App\View\Welcome\Service;

use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Welcome\WelcomeServiceHandler;
use App\Models\Categories\ServiceCategory;
use App\Models\Mall\Service;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeServiceRecentProps extends BaseView
{
    public function services()
    {
        return ServiceDisplayData::to_web_page(
            WelcomeServiceHandler::get_all_services(
                Service::latest('id')
            )
        );
    }

    public function category_types()
    {
        return CategoryTypeData::for_display(
            CategoryHandler::get_category_types(
                new ServiceCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
