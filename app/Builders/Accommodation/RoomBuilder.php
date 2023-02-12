<?php

namespace App\Builders\Accommodation;

use Illuminate\Database\Eloquent\Builder;

class RoomBuilder extends Builder
{
    public function selectMinAttributes(): self
    {
        return $this->select(
            'id',
            'uuid',
            'title',
            'type',
            'sale_status'
        );
    }

    public function selectDetailAttributes(): self
    {
        return $this->select(
            'id',
            'uuid',
            'title',
            'detail',
            'type',
            'sale_status'
        );
    }
}
