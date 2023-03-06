<?php

namespace App\Models\Shared;

use App\Builders\Shared\EmployeeBuilder;
use App\Models\User;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    use UUID;

    protected $fillable = [
        'name',
        'position',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function scopeSearch($query, ?string $terms = null)
    {
        collect(str_getcsv($terms, ' ', '"'))->filter()
            ->each(function ($term) use ($query) {
                $term = preg_replace('/[^A-Za-z0-9]/', '', $term) . '%';

                $query->whereIn('id', function ($query) use ($term) {
                    $query->select('id')
                        ->from(function ($query) use ($term) {
                            $query->select('id')
                                ->from('employees')
                                ->where('name', 'like', $term);
                        }, 'matches');
                });
            });
    }

    public function newEloquentBuilder($query)
    {
        return new EmployeeBuilder($query);
    }
}
