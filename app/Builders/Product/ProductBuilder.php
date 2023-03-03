<?php

namespace App\Builders\Product;

use Illuminate\Database\Eloquent\Builder;

class ProductBuilder extends Builder
{
    public function selectMinAttributes(): self
    {
        return $this->select(
            'products.id',
            'uuid',
            'title',
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
            'title',
            'price',
            'detail',
            'user_id',
            'sale_status'
        );
    }

    // public function ofCategoryType($type)
    // {
    //     // return $this->whereHas('categories',function($query) use($type){
    //     //     $query->ofType($type);
    //     // });

    //     return $this->whereRelation('categories','type',$type);
    // }

    public function dontInclude($id)
    {
        return $this->whereNot('products.id', $id);
    }

    public function search(?string $terms = null)
    {
        $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $terms) . '%';
        return $this->when($terms, function ($query) use ($term) {
            $query
                ->where('title_normalized', 'like', $term)
                ->orWhere('detail','like',$term);
        });
    }
}
