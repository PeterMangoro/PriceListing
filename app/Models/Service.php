<?php

namespace App\Models;

use App\Builders\Service\ServiceBuilder;
use App\Models\Categories\ServiceCategory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends SharedModel
{
    protected $fillable = [
        'title',
        'price',
        'detail',
        'location',
        'sale_status',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(ServiceCategory::class, 'service_classifications');
    }

    public function scopeSearch($query, ?string $terms = null)
    {
        collect(str_getcsv($terms, ' ', '"'))->filter()
            ->each(function ($term) use ($query) {
                $term = '%'.preg_replace('/[^A-Za-z0-9]/', '', $term) . '%';

                $query->whereIn('id', function ($query) use ($term) {
                    $query->select('id')
                        ->from(function ($query) use ($term) {
                            $query->select('id')
                                ->from('services')
                                ->where('title', 'like', $term)
                                ->union(
                                    $query->newQuery()
                                        ->select('services.id')
                                        ->from('services')
                                        ->join('users', 'users.id', 'services.user_id')
                                        ->where('users.name', 'like', $term)
                                );
                        }, 'matches');
                });
            });
    }

    public function newEloquentBuilder($query): ServiceBuilder
    {
        return new ServiceBuilder($query);
    }
}
