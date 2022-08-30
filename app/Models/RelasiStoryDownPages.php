<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelasiStoryDownPages extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'story_down_id',
        'pages_id',
    ];

    public function Pages(): BelongsTo
    {
        return $this->belongsTo(Pages::class, 'pages_id');
    }

    public function StoryDown(): BelongsTo
    {
        return $this->belongsTo(StoryDown::class, 'story_down_id');
    }
}
