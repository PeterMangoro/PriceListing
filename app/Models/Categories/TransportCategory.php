<?php

namespace App\Models\Categories;

use App\Models\Car\Transport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class TransportCategory extends Model
{
    use HasFactory;

    public function transports(): BelongsToMany
    {
        return 
        $this->belongsToMany(Transport::class, 'transport_classifications');
    }
}
