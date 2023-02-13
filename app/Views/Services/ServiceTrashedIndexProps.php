<?php

namespace App\Views\Services;

use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Service;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class ServiceTrashedIndexProps extends BaseView
{
    public function services()
    {
        return 
        ServiceDisplayData::toOwnerDisplay(
            ModelHandler::getPaginatedData(
                Service::onlyTrashed()
                ->belongsToAuthUser()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
