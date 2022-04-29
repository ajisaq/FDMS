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
        'name',
        'description',
        'station_id',
    ];

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }

    public function pos(): HasMany
    {
        return $this->hasMany(Pos::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}
