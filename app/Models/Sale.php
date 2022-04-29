<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'open_stock',
        'close_stock',
        'cluster_id',
    ];

    public function tank(): BelongsTo
    {
        return $this->belongsTo(Cluster::class, 'cluster_id', 'id');
    }
}
