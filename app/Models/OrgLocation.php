<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrgLocation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'org_id',
        'location_id'
    ];

    public function org(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function dispatch_companies(): HasMany
    {
        return $this->hasMany(DispatchCompany::class, 'location_id', 'id');
    }
}
