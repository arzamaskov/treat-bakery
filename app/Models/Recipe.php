<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'description',
        'image',
        'user_id',
        'category_id'
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Recipe $recipe) {
            $recipe->slug = $recipe->slug ?? str($recipe->name)->slug();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return  $this->belongsTo(Category::class);
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function emojis(): BelongsToMany
    {
        return $this->belongsToMany(Emoji::class);
    }
}
