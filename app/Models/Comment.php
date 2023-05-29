<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'body',
        'owner_type',
        'owner_id',
    ];

    public function owner(): MorphTo
    {
        return $this->morphTo();
    }
}
