<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'address',
        'contact',
        'user_id',
    ];


    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
