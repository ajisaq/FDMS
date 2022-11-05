<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cluster extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'name',
        // 'description',
        'type',
        'station_id',
        'supervisor_id',
        'cluster_type_id',
        'org_id',
    ];

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }
    
    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supervisor_id', 'id');
    }
    

    public function cluster_type(): BelongsTo
    {
        return $this->belongsTo(ClusterType::class, 'cluster_type_id', 'id');
    }

    public function pos(): HasMany
    {
        return $this->hasMany(Pos::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }

    public function inventories(): HasMany
    {
        return $this->hasMany(Inventory::class, 'cluster_id', 'id');
    }

    public function org(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function tanks(): HasMany
    {
        return $this->hasMany(Tank::class);
    }

    public function others(): HasMany
    {
        return $this->hasMany(Other::class);
    }
}
