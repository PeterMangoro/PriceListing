<?php

namespace App\Builders\Car\Insurance;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class CarInsuranceBuilder extends Builder
{
    public function selectMinAttributes(): self
    {
        return $this->select(
            'car_insurances.id',
            'owner',
            'contact',
            'car_title',
            'zimra',
            'car_insurance',
            'reg_exp',           
        );
    }

    public function selectDetailAttributes(): self
    {
        return $this->select(
            'car_insurances.id',
            'uuid',
            'owner',
            'contact',
            'car_title',
            'zimra',
            'car_insurance',
            'reg_exp',
            'reg_date',
            'car_reg',
        );
    }

    public function ofSameOwner(string $car_owner): self
    {
        return $this->where('owner', $car_owner);
    }

    public function whereExpired(): self
    {
        return $this->where('reg_exp','<', Carbon::now());
    }

    public function aboutToExpire(): self
    {
        return $this->where('reg_exp','<', Carbon::now()->subWeek());
    }

    public function dontInclude($id)
    {
        return $this->whereNot('car_insurances.id', $id);
    }
  

    public function userCarInsurances()
    {
        return $this->belongsToAuthUser();
    }

    public function search(?string $terms = null)
    {
        $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $terms) . '%';
        return $this->when($terms, function ($query) use ($term) {
            $query
                ->where('car_title_normalized', 'like', $term)
                ->orWhere('owner_normalized', 'like', $term)
                ->orWhere('car_reg_normalized', 'like', $term)
                ;
        });
    }
}
