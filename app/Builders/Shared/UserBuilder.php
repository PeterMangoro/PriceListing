<?php

namespace App\Builders\Shared;

use Illuminate\Database\Eloquent\Builder;

class UserBuilder extends Builder
{
    public function withSocialAccounts()
    {
        // return $this->with('socials:id,user_id,title,username,value');

        return $this->with([
            'socials' => function ($query) {
                $query->select(
                    'id',
                    'user_id',
                    'title',
                    // 'username',
                    'value'
                )
                    ->limit(6);
            },
        ]);
    }

    public function supplierOfAccommodations()
    {
        return $this->whereHas('accommodations');
    }

    public function supplierOfCars()
    {
        return $this->whereHas('cars');
    }

    public function supplierOfPlots()
    {
        return $this->whereHas('plots');
    }

    public function supplierOfProducts()
    {
        return $this->whereHas('products');
    }

    public function supplierOfServices()
    {
        return $this->whereHas('services');
    }

    public function supplierOfTransport()
    {
        return $this->whereHas('transports');
    }

    public function justASupplier()
    {
        return
            $this->whereHas('accommodations')
            ->orWhereHas('cars')
            ->orWhereHas('plots')
            ->orWhereHas('products')
            ->orWhereHas('services')
            ->orWhereHas('transports')
            ;
    }
}
