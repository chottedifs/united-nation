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
        'content',
    ];
    public function RelasiContentPages(): HasOne
    {
        return $this->hasOne(RelasiContentPages::class, 'content_id', 'id');
    }
}
