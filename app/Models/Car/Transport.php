<?php

namespace App\Models\Car;

use App\Builders\Transport\TransportBuilder;
use App\Models\Categories\TransportCategory;
use App\Models\Shared\SharedModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transport extends SharedModel
{
    protected $fillable = [
        'car_id',
        'destination',
        'departure',
        'date',
        'price',
        'passengers',
        'detail',
    ];

    // get the owner of the Product
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(TransportCategory::class, 'transport_classifications');
    }

    public function carMake(): BelongsTo
    {
        return $this->belongsTo(CarMake::class);
    }

    public function carModel(): BelongsTo
    {
        return $this->belongsTo(CarModel::class);
    }

    public function scopeIncludeCarDetail($query)
    {
        return $query->addSelect(
            [
                'car_make_id' => Car::select('car_make_id') #'attachment' gives the slot name where the query will be stored
                    ->whereColumn('cars.id', 'transports.car_id') #select where ids match (column in attachments table, column in desired table)  ->whereColumn('product_id','products.id')
                    // ->orderByDesc('created_at') #order by latest pic
                    ->limit(1), #get just 1 attachment becoz sub queries only take 1

                'car_model_id' => Car::select('car_model_id') #'attachment' gives the slot name where the query will be stored
                    ->whereColumn('cars.id', 'transports.car_id') #select where ids match (column in attachments table, column in desired table)  ->whereColumn('product_id','products.id')
                    // ->orderByDesc('created_at') #order by latest pic
                    ->limit(1),

                'num_plate' => Car::select('num_plate') #'attachment' gives the slot name where the query will be stored
                    ->whereColumn('cars.id', 'transports.car_id') #select where ids match (column in attachments table, column in desired table)  ->whereColumn('product_id','products.id')
                    // ->orderByDesc('created_at') #order by latest pic
                    ->limit(1),

            ],
        )->with('carMake:id,title', 'carModel:id,title');
    }

    public function scopeSearch($query)
    {
        return $query->when(request('owner'), function ($query) {
            $query->whereRelation('user', 'users.name', 'like', '%'.request('owner'). '%');
        })
            ->when(request('destination'), function ($query) {
                $query->where('destination', 'like', request('destination'). '%');
            })
            ->when(request('departure'), function ($query) {
                $query->where('departure', 'like', request('departure'). '%');
            })
            ->when(request('date'), function ($query) {
                $query->where('date', 'like', request('date'). '%');
            })
        ;
    }

    public function scopeUserCars($query)
    {
        return $query->belongsToAuthUser();
    }

    public function newEloquentBuilder($query): TransportBuilder
    {
        return new TransportBuilder($query);
    }
}
