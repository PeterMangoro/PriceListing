<?php

namespace App\Builders\Car;

use Illuminate\Database\Eloquent\Builder;

class CarCategoryBuilder extends Builder
{
    public function ofType(string $type): self
    {
        return $this->where('type', $type);
    }

    public function selectMinAttributes(): self
    {
        return $this->select('id', 'title', 'slug', 'type');
    }

    public function whichHasCar(int $id)
    {
        return $this->whereRelation('cars', 'cars.id', $id);
    }
}
