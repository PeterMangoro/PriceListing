<?php

namespace App\Builders\Accommodation;

use Illuminate\Database\Eloquent\Builder;

class AccommodationCategoryBuilder extends Builder
{
    public function ofType(string $type): self
    {
        return $this->where('type', 'like', $type);
    }

    public function selectMinAttributes(): self
    {
        return $this->select('id', 'title', 'slug', 'type');
    }

    public function whichHasAccommodation(int $id)
    {
        return $this->whereRelation('accommodations', 'accommodations.id', $id);
    }
}
