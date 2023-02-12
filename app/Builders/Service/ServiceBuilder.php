<?php

namespace App\Builders\Service;

use Illuminate\Database\Eloquent\Builder;

class ServiceBuilder extends Builder
{
    public function selectMinAttributes(): self
    {
        return $this->select(
            'services.id',
            'uuid',
            'title',
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
        return $this->whereNot('services.id', $id);
    }
}
