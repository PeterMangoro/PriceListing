<?php

namespace App\Models\Car;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
