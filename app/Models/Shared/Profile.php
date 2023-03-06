<?php

namespace App\Models\Shared;

use App\Models\User;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Profile extends Model
{
    use HasFactory;
    use UUID;

    protected $fillable = [
        'mission',
        'vision',
        'company_values',
        'history',
        'year',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function documents(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachmentable')->where('type', 'document');
    }

    public function trashed_attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachmentable')->onlyTrashed();
    }

    public function trashed_documents(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachmentable')->where('type', 'document')->onlyTrashed();
    }
}
