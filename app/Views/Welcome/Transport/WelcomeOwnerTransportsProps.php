<?php

namespace App\View\Welcome\Transport;

use App\Handlers\Transport\TransportHandler;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeOwnerTransportsProps extends BaseView
{
    public function __construct(public object $owner)
    {
        $this->owner = $owner;
    }

    public function transports()
    {
        return TransportHandler::get_paginated_transports($this->owner->transports(), 18);
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
