<?php

namespace App\View\Shared\Room;

use App\View\Shared\BaseView;

class RoomCreateProps extends BaseView
{
    public function __construct(
        public object $model,
    ) {
        $this->model = $model;
    }

    public function parent()
    {
        return $this->model;
    }
}
