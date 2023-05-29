<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Tag $tag) {
            $tag->slug = $tag->slug ?? str($tag->name)->slug();
        });
    }

    public function recipe(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function tip(): BelongsToMany
    {
        return $this->belongsToMany(Tip::class);
    }
}
