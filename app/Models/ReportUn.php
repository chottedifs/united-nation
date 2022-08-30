<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportUn extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'content_1',
        'content_2',
        'content_3',
        'content_4',
        'content_5',
        'content_6',
    ];
    public function RelasiUnReportPages(): HasOne
    {
        return $this->hasOne(RelasiUnReportPages::class, 'reportun_id', 'id');
    }
}
