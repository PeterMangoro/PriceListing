<?php

namespace App\Views\Welcome\Transport;

use App\Handlers\Shared\ModelHandler;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeOwnerTransportsProps extends BaseView
{
    public function __construct(public object $owner)
    {
        $this->owner = $owner;
    }

    public function transports()
    {
        return ModelHandler::getPaginatedData(
            $this->owner->transports(),
            18
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
