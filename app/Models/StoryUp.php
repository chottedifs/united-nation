<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoryUp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'position',
        'image_cover',
        'image_box',
        'description',
    ];

    public function RelasiStoryUpPages(): HasOne
    {
        return $this->hasOne(RelasiStoryUpPages::class, 'story_up_id', 'id');
    }
}
