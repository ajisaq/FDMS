<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pump extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'service_type',
        'description',
        'tank_id',
    ];

    public function tank(): BelongsTo
    {
        return $this->belongsTo(Tank::class, 'tank_id', 'id');
    }
}
