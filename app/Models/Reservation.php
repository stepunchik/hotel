<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = false;
    
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    
    public function rooms(): BelongsToMany {
        return $this->belongsToMany(Room::class);
    }
}
