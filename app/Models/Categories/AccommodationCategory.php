<?php

namespace App\Models\Categories;

use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Builders\Accommodation\AccommodationCategoryBuilder;



class AccommodationCategory extends Model
{
    use HasFactory;

    public function accommodations(): BelongsToMany
    {
        return 
        $this->belongsToMany(Accommodation::class, 'accommodation_classifications');
    }

    public function newEloquentBuilder($query): AccommodationCategoryBuilder
    {
        return new AccommodationCategoryBuilder($query);
    }
}
