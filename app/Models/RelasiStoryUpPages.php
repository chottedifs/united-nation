<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelasiStoryUpPages extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'story_up_id',
        'pages_id',
    ];

    public function Pages(): BelongsTo
    {
        return $this->belongsTo(Pages::class, 'pages_id');
    }

    public function StoryUp(): BelongsTo
    {
        return $this->belongsTo(StoryUp::class, 'story_up_id');
    }
}
