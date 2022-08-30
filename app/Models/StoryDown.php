<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoryDown extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'position',
        'image_cover',
        'image_box',
        'description',
    ];

    public function RelasiStoryDownPages(): HasOne
    {
        return $this->hasOne(RelasiStoryDownPages::class, 'story_down_id', 'id');
    }
}
