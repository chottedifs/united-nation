<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RelasiReportPages extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'report_id',
        'pages_id',
    ];

    public function Report(): BelongsTo
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function Pages(): BelongsTo
    {
        return $this->belongsTo(Pages::class, 'pages_id');
    }
}
