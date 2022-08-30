<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RelasiContentPages extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'content_id',
        'pages_id',
    ];

    public function Content(): BelongsTo
    {
        return $this->belongsTo(Content::class, 'content_id');
    }

    public function Pages(): BelongsTo
    {
        return $this->belongsTo(Pages::class, 'pages_id');
    }
}
