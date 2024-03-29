<?php

namespace App\Views\Shared\Room;

use App\Views\Shared\BaseView;

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
