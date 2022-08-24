<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class RelasiInfografisPages extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'infografis_id',
        'pages_id',
    ];
}
