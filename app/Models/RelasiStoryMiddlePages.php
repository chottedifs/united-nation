<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelasiStoryMiddlePages extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'story_middle_id',
        'pages_id',
    ];

    public function Pages(): BelongsTo
    {
        return $this->belongsTo(Pages::class, 'pages_id');
    }

    public function StoryMiddle(): BelongsTo
    {
        return $this->belongsTo(StoryMiddle::class, 'story_middle_id');
    }
}
