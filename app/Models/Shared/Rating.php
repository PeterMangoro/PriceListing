<?php

namespace App\Models\Shared;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'rating',
        'comment',
        'ratingable_id',
        'ratingable_type',
        'user_id',
        'name',
    ];

    public function ratingable(): MorphTo
    {
        return $this->morphTo('ratingable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
