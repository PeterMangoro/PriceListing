<?php

namespace App\Models\Car;

use App\Models\Car\CarMake;
use App\Models\Shared\SharedModel;
use App\Models\Car\CarModel;
use App\Models\Car\Transport;
use App\Builders\Car\CarBuilder;
use App\Models\Categories\CarCategory;

class Car extends SharedModel
{
    protected $fillable = [
        'car_make_id',
        'car_model_id',
        'sale_status',
        'rent_status',
        'num_plate',
        'price',
        'detail',
        'location',
    ];

    public function categories()
    {
        return $this->belongsToMany(CarCategory::class, 'car_classifications');
    }

    // this car has a carMake
    public function carMake()
    {
        return $this->belongsTo(CarMake::class);
    }

    // this car belongs to transport
    public function transports()
    {
        return $this->hasMany(Transport::class);
    }

    // a car has a model,
    // this model has a carMake
    // this car has a carMake
    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }

    // public function cars()
    // {
    //     return $this->hasManyThrough(Car::class,CarModel::class);
    // }

    public function scopeSearch($query, ?string $terms = null)
    {
        collect(str_getcsv($terms, ' ', '"'))->filter()
            ->each(function ($term) use ($query) {
                $term = '%' . preg_replace('/[^A-Za-z0-9]/', '', $term) . '%';

                $query->whereIn(
                    'id',
                    function ($query) use ($term) {
                        $query->select('id')
                            ->from(
                                function ($query) use ($term) {
                                    // dd('hie');
                                    $query->select('cars.id')
                                        ->from('cars')

                                        // ->union(
                                            // $query->newQuery()
                                                // ->select('cars.id')
                                                // ->from('cars')
                                        ->join('car_makes', 'car_makes.id', 'cars.car_make_id')
                                        ->join('car_models', 'car_models.id', 'cars.car_model_id')
                                        ->where('car_makes.title', 'like', $term)
                                        ->orWhere('car_models.title', 'like', $term)

                                        // )
                                    ;
                                },
                                'matches'
                            );
                    }
                );
            });
    }

    public function newEloquentBuilder($query): CarBuilder
    {
        return new CarBuilder($query);
    }
}
