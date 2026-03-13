<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'country',
        'salary',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class)->withTimestamps();
    }
}
