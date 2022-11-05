<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dispatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'org_id',
        'dispatcher_name',
        'inventory_id',
        'd_company_id',
        'quantity_dispatched',
        'v_plate_number',
        'dispatch_company',
        'ref_id',
        'station_id',
        'manager_id',
        'quantity_recieved',
        'remark',
        'status',
        'dispatch_time',
        'arival_time',
    ];

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id', 'id');
    }

    public function d_company(): BelongsTo
    {
        return $this->belongsTo(DispatchCompany::class, 'd_company_id', 'id');
    }
}
