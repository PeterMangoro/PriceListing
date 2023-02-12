<?php

namespace App\Models\Categories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use App\Builders\Service\ServiceCategoryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class ServiceCategory extends Model
{
    use HasFactory;

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'service_classifications');
    }

    public function newEloquentBuilder($query): ServiceCategoryBuilder
    {
        return new ServiceCategoryBuilder($query);
    }
}
