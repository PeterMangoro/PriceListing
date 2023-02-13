<?php

namespace App\Views\Shared\Social;

use App\DataObjects\Social\SocialDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Shared\Social;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

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
