<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'content',
    ];
}
