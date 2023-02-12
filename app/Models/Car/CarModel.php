<?php

namespace App\Models\Car;

use App\Models\Car\Car;
use App\Models\Car\CarMake;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class CarModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;

    protected $guarded = [];
    protected $fillable = [

        'title',
        'car_make_id',

    ];
    public function carMake(): BelongsTo
    {
        return $this->belongsTo(CarMake::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
