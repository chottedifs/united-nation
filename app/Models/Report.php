<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'image_cover',
        'description',
    ];

    public function RelasiReportPages(): HasOne
    {
        return $this->hasOne(RelasiReportPages::class, 'report_id', 'id');
    }
}
