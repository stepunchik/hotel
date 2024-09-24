<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = false;
    
    public function category(): BelongsTo {
        return $this->belongsTo(RoomCategory::class);
    }
    
    public function photos(): HasMany {
        return $this->hasMany(RoomPhoto::class);
    }

    public function reservations(): HasMany {
        return $this->hasMany(Reservation::class);
    }
}
