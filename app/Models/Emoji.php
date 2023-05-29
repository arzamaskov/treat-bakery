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

    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function tips(): BelongsToMany
    {
        return $this->belongsToMany(Tip::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
