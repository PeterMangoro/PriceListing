<?php

namespace App\Builders\Accommodation;

use Illuminate\Database\Eloquent\Builder;

class AccommodationBuilder extends Builder
{
    public function selectMinAttributes(): self
    {
        return $this->select(
            'accommodations.id',
            'uuid',
            'a_rooms',
            'price',
            'page_visits',
            'created_at'
        );
    }

    public function selectDetailAttributes(): self
    {
        return $this->select(
            'id',
            'uuid',
            'a_rooms',
            'price',
            'detail',
            'user_id',
            'sale_status'
        );
    }

    public function forRental()
    {
        return $this->where('rental_status', 1);
    }

    public function forLodges()
    {
        return $this->where('lodge_status', 1);
    }

    public function dontInclude($id)
    {
        return $this->whereNot('accommodations.id', $id);
    }

    public function fromSameCity($city)
    {
        return $this->whereRelation('address', 'city', $city);
    }

    public function search(?string $terms = null)
    {
        $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $terms) . '%';
        return $this->when($terms, function ($query) use ($term) {
            $query
                ->where('location', 'like', $term);
        });
    }
}
