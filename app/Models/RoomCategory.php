<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;

    protected $guarded = false;
    
    public function rooms(): HasMany {
        return $this->hasMany(Room::class);
    }
}
