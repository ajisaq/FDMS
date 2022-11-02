<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Station extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'location',
        'address',
        'contact',
        // 'no_of_clusters',
        // 'no_of_pos',
        'active',
        'manager_id',
        'org_id',
    ];

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id', 'id');
    }

    public function loc(): BelongsTo
    {
        return $this->belongsTo(OrgLocation::class, 'location', 'id');
    }

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supervisor_id', 'id');
    }

    public function inventories(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }

    public function devices(): HasMany
    {
        return $this->hasMany(Device::class);
    }

    public function clusters(): HasMany
    {
        return $this->hasMany(Cluster::class, 'no_');
    }

    public function pos(): HasMany
    {
        return $this->hasMany(Cluster::class);
    }

    public function org(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }
}
