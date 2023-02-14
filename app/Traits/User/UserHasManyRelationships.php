<?php

namespace App\Traits\User;

use App\Models\Plot;
use App\Models\Car\Car;
use App\Models\Product;
use App\Models\Service;
use App\Models\Vacancy;
use App\Models\Accommodation;
use App\Models\Car\Transport;
use App\Models\Shared\Rating;
use App\Models\Shared\Social;
use App\Models\Shared\Employee;
use App\Models\Shared\RoomUser;
use Illuminate\Database\Eloquent\Relations\HasMany;



trait UserHasmanyRelationships
{
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(RoomUser::class, 'room_id');
    }


    public function socials(): HasMany
    {
        return $this->hasMany(Social::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function plots(): HasMany
    {
        return $this->hasMany(Plot::class);
    }

    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function transports(): HasMany
    {
        return $this->hasMany(Transport::class);
    }

    public function accommodations(): HasMany
    {
        return $this->hasMany(Accommodation::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

   

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
