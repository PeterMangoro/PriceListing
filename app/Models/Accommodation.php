<?php

namespace App\Models;

use App\Models\Shared\Room;
use App\Models\SharedModel;
use App\Models\Categories\AccommodationCategory;
use App\Builders\Accommodation\AccommodationBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Accommodation extends SharedModel
{
    protected $fillable = [
        'a_rooms',
        't_rooms',
        'detail',
        'price',
        'sale_status',
        'location',

    ];

    public function newEloquentBuilder($query): AccommodationBuilder
    {
        return new AccommodationBuilder($query);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(AccommodationCategory::class, 'accommodation_classifications');
    }

  public function rooms()
  {
      return $this->morphMany(Room::class, 'roomable');
  }
}
