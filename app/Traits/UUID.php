<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UUID
{

    // Tells the database not to auto-increment this field
    public function getIncrementing()
    {
        return false;
    }

    // Helps the application specify the field type in the database
    public function getKeyType()
    {
        return 'string';
    }
    protected static function boot()
    {
        // Boot other traits on the Model
        parent::boot();

        /**
         * Listen for the creating event on the user model.
         * Sets the 'uuid' to a UUID using Str::uuid() on the instance being created
         */
        static::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }
}
