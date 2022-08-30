<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RelasiStoryPages extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'story_id',
        'pages_id',
    ];

    public function Pages(): BelongsTo
    {
        return $this->belongsTo(Pages::class, 'pages_id');
    }

    public function Story(): BelongsTo
    {
        return $this->belongsTo(Story::class, 'story_id');
    }
}
