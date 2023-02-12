<?php

namespace App\Builders\Product;

use Illuminate\Database\Eloquent\Builder;

class ProductCategoryBuilder extends Builder
{
    public function ofType(string $type): self
    {
        return $this->where('type', 'like', $type);
    }

    public function selectMinAttributes(): self
    {
        return $this->select('id', 'title', 'slug', 'type');
    }

    public function whichHasProduct(int $id)
    {
        return $this->whereRelation('products', 'products.id', $id);
    }
}
