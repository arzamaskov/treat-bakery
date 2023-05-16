<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Category $category) {
            $category->slug = $category->slug ?? str($category->name)->slug();
        });
    }
}
