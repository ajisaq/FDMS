<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pos extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'service_type',
        'description',
        'cluster_id',
    ];

    public function cluster(): BelongsTo
    {
        return $this->belongsTo(Cluster::class, 'cluster_id', 'id');
    }
}
