<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'genre',
        'img_url',
        'duration',
        'country',
    ];

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class)->withTimestamps();
    }
}
