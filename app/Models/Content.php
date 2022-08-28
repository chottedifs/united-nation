<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'content_1',
        'content_2',
        'content_3',
        'content_4',
    ];
    public function RelasiContentPages(): HasOne
    {
        return $this->hasOne(RelasiContentPages::class, 'content_id', 'id');
    }
}
