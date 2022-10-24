<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact',
        'email',
        'phone',
        'org_id',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
    public function org(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }
}
