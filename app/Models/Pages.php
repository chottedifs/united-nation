<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pages extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'image_cover'
    ];

    public function RelasiStoryPages(): HasMany
    {
        return $this->HasMany(RelasiStoryPages::class, 'pages_id', 'id');
    }

    public function RelasiReportPages(): HasMany
    {
        return $this->HasMany(RelasiReportPages::class, 'pages_id', 'id');
    }

    public function RelasiContentPages(): HasOne
    {
        return $this->HasOne(RelasiContentPages::class, 'pages_id', 'id');
    }

    public function RelasiInfografisPages(): HasMany
    {
        return $this->HasMany(RelasiInfografisPages::class, 'pages_id', 'id');
    }
}
