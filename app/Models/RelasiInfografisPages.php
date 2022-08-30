<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RelasiInfografisPages extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'infografis_id',
        'pages_id',
    ];

    public function Infografis(): BelongsTo
    {
        return $this->belongsTo(Infografis::class, 'infografis_id');
    }

    public function Pages(): BelongsTo
    {
        return $this->belongsTo(Pages::class, 'pages_id');
    }
}
