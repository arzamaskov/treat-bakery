<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany};
use Illuminate\Database\Eloquent\Relations\{HasMany, MorphMany};

class Tip extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'body',
        'image',
        'user_id',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Tip $tip) {
            $tip->slug = $tip->slug ?? str($tip->title)->slug();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function emojis(): BelongsToMany
    {
        return $this->belongsToMany(Emoji::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'owner');
    }
}
