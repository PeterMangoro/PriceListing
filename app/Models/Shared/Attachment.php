<?php

namespace App\Models\Shared;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Attachment extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UUID;

    protected $fillable = [
        'title',
        'type',
        'mime_type',
        'path',
        'attachmentable_id',
        'attachmentable_type',

    ];
    public function attachmentable(): MorphTo
    {
        return $this->morphTo('attachmentable');
    }
}
