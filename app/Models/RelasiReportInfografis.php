<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelasiReportInfografis extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'infografis_id',
        'report_id',
    ];

    public function Report(): BelongsTo
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function Infografis(): BelongsTo
    {
        return $this->belongsTo(Infografis::class, 'infografis_id');
    }
}
