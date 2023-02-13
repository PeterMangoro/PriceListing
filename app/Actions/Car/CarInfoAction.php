<?php

namespace App\Actions\Car;


use App\Models\Car\CarMake;
use Illuminate\Support\Collection;

class CarInfoAction
{
    public static function handle(): Collection
    {
        return CarMake::with('carModels:title,car_make_id,id')
            ->select(
                'id',
                'title'
            )
            ->get()
        ;
    }
}
