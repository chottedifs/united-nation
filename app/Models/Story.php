<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Story extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'position',
        'image',
        'title',
        'sub_title',
        'description',
    ];

    public function RelasiStoryPages(): HasOne
    {
        return $this->hasOne(RelasiStoryPages::class, 'story_id', 'id');
    }
}
