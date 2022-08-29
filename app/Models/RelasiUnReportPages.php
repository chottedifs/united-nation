<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelasiUnReportPages extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'reportun_id',
        'pages_id',
    ];

    public function ReportUn(): BelongsTo
    {
        return $this->belongsTo(ReportUn::class, 'reportun_id');
    }

    public function Pages(): BelongsTo
    {
        return $this->belongsTo(Pages::class, 'pages_id');
    }
}
