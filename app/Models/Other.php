<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Other extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cluster_id',
        'org_id',
    ];

    public function org(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function cluster(): BelongsTo
    {
        return $this->belongsTo(Cluster::class, 'cluster_id');
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class, 'sub_cluster_id', 'id');
    }

    public function pos(): HasMany
    {
        return $this->hasMany(Pos::class, 'sub_cluster_id', 'id');
    }

    public function cluster_type(): BelongsTo
    {
        return $this->belongsTo(ClusterType::class, 'name', 'id');
    }
}
