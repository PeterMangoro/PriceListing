<?php

namespace App\View\Shared\Social;

use App\DataObjects\Social\SocialDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Handlers\Shared\SocialHandler;
use App\Models\Shared\Social;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class SocialIndexProps extends BaseView
{
    public function socials()
    {
        return SocialDisplayData::toOwnerDisplay(
            ModelHandler::getPaginatedData(
                Social::belongsToAuthUser(),
                12
            )
        );
    }
    public function filters()
    {
        return Filters::filters();
    }
}
