<?php

namespace App\Views\Welcome\Service;

use App\DataObjects\Service\ServiceDetailData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Model\ModelHandler;
use App\Handlers\Service\ServiceHandler;
use App\Models\Categories\ServiceCategory;
use App\Models\Service;
use App\ValueObjects\CategoryType;
use App\Views\Shared\BaseView;

class WelcomeServiceShowProps extends BaseView
{
    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
        $this->service =
            ModelHandler::getModelForDisplay(
                new Service(),
                $uuid
            );
        $this->category =
            CategoryHandler::get_category(
                ServiceCategory::whichHasService($this->service->id)
            );
    }

    public function service()
    {
        return ServiceDetailData::toWebPage($this->service);
    }

    public function category_type()
    {
        return CategoryType::from($this->category->type);
    }

    public function similar_services()
    {
        return ServiceDisplayData::collectionToWebPage(
            ServiceHandler::get_unpaginated_services(
                $this->category->services()
                    ->dontInclude($this->service->id),
                9
            )
        );
    }

    public function owner_services()
    {
        return ServiceDisplayData::collectionToWebPage(
            ServiceHandler::get_unpaginated_services(
                Service::belongsToOwner($this->service->user->id)
                    ->dontInclude($this->service->id),
                9
            )
        );
    }
}
