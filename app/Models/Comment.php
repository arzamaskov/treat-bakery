<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'parent_id',
        'body',
        'owner_type',
        'owner_id'
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Comment $comment) {
            $comment->slug = $comment->slug ?? str($comment->title)->slug();
        });
    }
}
