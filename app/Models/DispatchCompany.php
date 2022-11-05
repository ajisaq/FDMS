<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DispatchCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'org_id',
        'location_id',
        'name',
        'phone',
    ];

    public function org(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(OrgLocation::class, 'location_id', 'id');
    }

    public function dispatches(): HasMany
    {
        return $this->hasMany(Dispatch::class, 'd_company_id', 'id');
    }
}
