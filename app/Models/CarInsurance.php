<?php

namespace App\Models;

use App\Builders\Car\Insurance\CarInsuranceBuilder;
use App\Models\Shared\SharedModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarInsurance extends SharedModel
{
    use HasFactory;

    protected $fillable = [
        'owner',
        'contact',
        'car_title',
        'car_reg',
        'payment',
        'reg_date',
        'reg_exp',
        // 'user_id',

    ];

    public function newEloquentBuilder($query): CarInsuranceBuilder
    {
        return new CarInsuranceBuilder($query);
    }
}
