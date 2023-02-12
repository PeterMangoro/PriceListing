<?php

namespace App\Models\Categories;

use App\Models\Car\Car;
use Illuminate\Database\Eloquent\Model;
use App\Builders\Car\CarCategoryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class CarCategory extends Model
{
    use HasFactory;

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class, 'car_classifications');
    }

    public function newEloquentBuilder($query): CarCategoryBuilder
    {
        return new CarCategoryBuilder($query);
    }
}
