<?php

namespace App\Models\Shared;

use App\Builders\Shared\SharedScopes;
use App\Casts\MakePointsCast;
use App\Models\Team;
use App\Models\User;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class SharedModel extends Model
{
    use HasFactory;
    use UUID;
    use SoftDeletes;
    use SharedScopes;

    protected $casts = [
        'sale_status' => 'boolean',
        'detail' => MakePointsCast::class,
    ];

    protected $hidden = [
        'pivot',
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
        return $this->morphMany(Attachment::class, 'attachmentable')
            ->where('type', 'document');
    }

    public function trashed_attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachmentable')
            ->onlyTrashed();
    }

    public function trashed_documents(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachmentable')
            ->where('type', 'document')
            ->onlyTrashed();
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function popular(): MorphOne
    {
        return $this->morphOne(Popular::class, 'popularable');
    }

    public function featured(): MorphOne
    {
        return $this->morphOne(Feature::class, 'featurable');
    }

    public function discount(): MorphOne
    {
        return $this->morphOne(Discount::class, 'discountable');
    }

    public function ratings(): MorphMany
    {
        return $this->morphMany(Rating::class, 'ratingable');
    }

    public function prices(): MorphMany
    {
        return $this->morphMany(Price::class, 'pricable');
    }

    public function latestPrice()
    {
        return $this->morphOne(Price::class, 'pricable')->latest('id');
    }

    public function latestImage()
    {
        return $this->morphOne(Attachment::class, 'attachmentable')
            ->where('type', 'image')
            // ->latest('id')  #this calls all models then selects the last
            ->latestOfMany('id')    #calls only the last model
        ;
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'payable');
    }
    /**
     * groups the user wants the car to be shown in
     *
     * @return void
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'item_team');
    }
}
