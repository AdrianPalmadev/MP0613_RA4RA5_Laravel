<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class);
    }
}
