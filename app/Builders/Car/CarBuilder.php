<?php

namespace App\Builders\Car;

use App\Models\Car\CarMake;
use App\Models\Car\CarModel;
use Illuminate\Database\Eloquent\Builder;

class CarBuilder extends Builder
{
    public function selectMinAttributes(): self
    {
        return $this->select(
            'cars.id',
            'page_visits',
            'uuid',
            'car_make_id',
            'car_model_id',
            'num_plate',
            'price',
            'sale_status'
        );
    }

    public function selectDetailAttributes(): self
    {
        return $this->select(
            'cars.id',
            'uuid',
            'detail',
            'car_make_id',
            'car_model_id',
            'num_plate',
            'price',
            'sale_status',
            'rent_status'
        );
    }

    public function ofSameMake(string $car_make): self
    {
        return $this->where('car_make_id', $car_make);
    }

    public function forSale(): self
    {
        return $this->whereNot('transport', '1');
    }

    public function forHire(): self
    {
        return $this->where('rent_status', '1');
    }

    public function dontInclude($id)
    {
        return $this->whereNot('cars.id', $id);
    }

    public function includeCarDetail()
    {
        return $this->addSelect(
            [
                'car_make' => CarMake::select('title') #'attachment' gives the slot name where the query will be stored
                    ->whereColumn('car_makes.id', 'cars.car_make_id') #select where ids match (column in attachments table, column in desired table)  ->whereColumn('product_id','products.id')
                    // ->orderByDesc('created_at') #order by latest pic
                    ->limit(1),
                #get just 1 attachment becoz sub queries only take 1

                'car_model' => CarModel::select('title') #'attachment' gives the slot name where the query will be stored
                    ->whereColumn('car_models.id', 'cars.car_model_id') #select where ids match (column in attachments table, column in desired table)  ->whereColumn('product_id','products.id')
                    // ->orderByDesc('created_at') #order by latest pic
                    ->limit(1),
            ],
        );
    }

    public function userCars()
    {
        return $this->belongsToAuthUser();
    }
}
