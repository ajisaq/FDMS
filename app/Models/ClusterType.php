<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClusterType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'org_id',
    ];

    public function clusters(): HasMany
    {
        return $this->hasMany(Cluster::class, 'cluster_type_id', 'id');
    }
    
    
}
