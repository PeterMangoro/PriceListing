<?php

namespace App\Views\Services;

use App\Models\Service;
use App\View\Shared\Filters;
use App\View\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Service\ServiceDisplayData;

class ServiceIndexProps extends BaseView
{
    public function services()
    {
        return 
        ServiceDisplayData::toOwnerDisplay(
            ModelHandler::getPaginatedData(
                Service::belongsToOwner()));
    }

    public function filters()
    {
        return Filters::filters();
    }
}
