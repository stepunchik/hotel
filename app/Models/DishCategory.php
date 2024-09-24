<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishCategory extends Model
{
    use HasFactory;

    protected $guarded = false;
    
    public function dishes(): HasMany {
        return $this->hasMany(Dish::class);
    }
}
