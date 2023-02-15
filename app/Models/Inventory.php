<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'with_quantity',
        'with_payer_name',
        'unit',
        'station_id',
        'cluster_id',
        'category_id',
        'org_id',
    ];

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }

    public function cluster(): BelongsTo
    {
        return $this->belongsTo(Cluster::class, 'cluster_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function devices(): BelongsToMany
    {
        return $this->belongsToMany(Device::class);
    }

    public function stock(): HasOne
    {
        return $this->hasOne(Stock::class, "inventory_id", "id");
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'inventory_id', 'id');
    }

    public function org(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }
}
