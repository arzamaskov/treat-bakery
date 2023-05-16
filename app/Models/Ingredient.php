<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Ingredient $ingredient) {
            $ingredient->slug = $ingredient->slug ?? str($ingredient->name)->slug();
        });
    }

    public function recipe(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class);
    }
}
