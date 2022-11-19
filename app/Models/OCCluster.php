<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OCCluster extends Model
{
    use HasFactory;

    protected $fillable = [
        'action',
        'o_c_station_id',
        'cluster_id',
        'c_sub_id',
        'm_reading',
        'time',
    ];

    public function o_c_station(): BelongsTo
    {
        return $this->belongsTo(OCStation::class, 'o_c_station_id', 'id');
    }

    public function cluster(): BelongsTo
    {
        return $this->belongsTo(Cluster::class, 'cluster_id', 'id');
    }

}
