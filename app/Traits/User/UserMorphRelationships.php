<?php

namespace App\Traits\User;

use App\Models\Attachment;
use App\Models\Shared\Address;
use App\Models\Shared\Payment;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait UserMorphRelationships
{
    //Morph Relationships

    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'payable');
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
