<?php

namespace App\Models\Car;

use App\Models\Car\Car;
use App\Models\Car\CarModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarMake extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $guarded = [];
    protected $fillable = [

        // 'car_make_id',
        'title',

    ];

    public function carModels(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
