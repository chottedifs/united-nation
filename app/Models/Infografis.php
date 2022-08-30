<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Infografis extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'image',
    ];

    public function RelasiInfografisPages(): HasOne
    {
        return $this->hasOne(RelasiInfografisPages::class, 'infografis_id', 'id');
    }
}
