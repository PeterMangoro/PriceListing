<?php

namespace App\Builders\Service;

use Illuminate\Database\Eloquent\Builder;

class ServiceCategoryBuilder extends Builder
{
    public function ofType(string $type): self
    {
        return $this->where('type', $type);
    }

    public function selectMinAttributes(): self
    {
        return $this->select('id', 'title', 'slug', 'type');
    }

    public function whichHasService(int $id)
    {
        return $this->whereRelation('services', 'services.id', $id);
    }
}
