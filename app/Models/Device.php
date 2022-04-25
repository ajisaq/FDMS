<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'station_id',
    ];

    public function inventories(): BelongsToMany
    {
        return $this->belongsToMany(Inventory::class);
    }

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }
}
