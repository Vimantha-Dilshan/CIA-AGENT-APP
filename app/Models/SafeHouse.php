<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SafeHouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'security_level',
        'status',
        'location_id',
        'agent_in_charge',
        'established_in',
        'notes',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_in_charge');
    }
}
