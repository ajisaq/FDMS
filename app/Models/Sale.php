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
        'tank_id',
    ];

    public function tank(): BelongsTo
    {
        return $this->belongsTo(Tank::class, 'tank_id', 'id');
    }
}
