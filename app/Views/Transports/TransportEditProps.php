<?php

namespace App\Views\Transports;

use App\Handlers\Car\CarHandler;
use App\Listeners\Mall\Model\ModelEditListener;
use App\View\Shared\BaseView;
use App\View\Shared\CarMakes;
use App\View\Shared\Teams;

class TransportEditProps extends BaseView
{
    public function __construct(public $uuid)
    {
        $this->uuid = $uuid;
    }

    public function transport()
    {
        return (new ModelEditListener())->get_transport($this->uuid);
    }

    public function ownerCars()
    {
        return CarHandler::get_plain_user_cars();
    }

    public function teams()
    {
        return (new Teams())->teams($this->uuid);
    }

    public function carMakes()
    {
        return (new CarMakes())->carMakes();
    }
}
