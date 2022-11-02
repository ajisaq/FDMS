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
        // 'description',
        'cluster_id',
        'sub_cluster_id',
        'org_id',
    ];

    public function cluster(): BelongsTo
    {
        return $this->belongsTo(Cluster::class, 'cluster_id', 'id');
    }

    public function org(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function tank(): BelongsTo
    {
        return $this->belongsTo(Tank::class, 'sub_cluster_id', 'id');
    }

    public function other(): BelongsTo
    {
        return $this->belongsTo(Other::class, 'sub_cluster_id', 'id');
    }
}
