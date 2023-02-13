<?php

namespace App\Views\Welcome\Service;

use App\Models\Service;
use App\Views\Shared\BaseView;
use App\ValueObjects\CategoryType;
use App\Handlers\Shared\ModelHandler;
use App\Handlers\Service\ServiceHandler;
use App\Models\Categories\ServiceCategory;
use App\DataObjects\Service\ServiceDetailData;
use App\DataObjects\Service\ServiceDisplayData;



class WelcomeServiceShowProps extends BaseView
{
    public object $category;
    public object $service;
    public function __construct(public string $uuid)
    {
        $this->uuid = $uuid;
        $this->service =
            ModelHandler::getModelForDisplay(
                new Service(),
                $uuid
            );
        $this->category =
         
                ServiceCategory::whichHasService($this->service->id)->first();
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
            ModelHandler::getUnPaginatedData(
                $this->category->services()
                    ->dontInclude($this->service->id),
                9
            )
        );
    }

    public function owner_services()
    {
        return ServiceDisplayData::collectionToWebPage(
            ModelHandler::getUnPaginatedData(
                Service::belongsToOwner($this->service->user->id)
                    ->dontInclude($this->service->id),
                9
            )
        );
    }
}
