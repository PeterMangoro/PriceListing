<?php

namespace App\Builders\Plot;

use Illuminate\Database\Eloquent\Builder;

class PlotBuilder extends Builder
{
    public function selectMinAttributes(): self
    {
        return $this->select(
            'plots.id',
            'uuid',
            'price',
            'location',
            'size',
        );
    }

    public function selectDetailAttributes(): self
    {
        return $this->select(
            'plots.id',
            'user_id',
            'uuid',
            'detail',
            'location',
            'price',
            'size',
            'sale_status'
        );
    }

    public function fromSameLocation(string $location): self
    {
        // dd($location);
        return $this->whereRelation('address', 'addresses.city', $location);
    }

    public function dontInclude($id)
    {
        return $this->whereNot('plots.id', $id);
    }

    public function withCategories(): self
    {
        return $this->select(
            'plots.id',
            'user_id',
            'uuid',
            'detail',
            'location',
            'price',
            'size',
            'sale_status'
        );
    }
}
