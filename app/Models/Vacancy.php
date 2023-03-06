<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacancy extends Model
{
    use HasFactory;
    use SoftDeletes;
    use UUID;

    protected $guarded = [];
    protected $fillable = [];

    // Relationships
    // get the owner of the Product
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * groups the user wants the service to be shown in
     *
     * @return void
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'item_team');
    }
}
