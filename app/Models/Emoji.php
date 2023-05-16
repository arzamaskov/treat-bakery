<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Emoji extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function recipe(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function tip(): BelongsToMany
    {
        return $this->belongsToMany(Tip::class);
    }
}
