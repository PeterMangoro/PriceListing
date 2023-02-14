<?php

namespace App\Casts;

use App\ValueObjects\MakePoints;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class MakePointsCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     *
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return MakePoints::from($value);

        #when they are related
        // return [
        //     'notes'=>MakePoints::from($attributes['notes']),
        //    'prayer_points'=> MakePoints::from($attributes['prayer_points']),
        // ];
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     *
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }
}
