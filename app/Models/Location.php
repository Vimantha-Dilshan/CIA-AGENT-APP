<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'agent_in_charge',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_in_charge');
    }

    public function safeHouses()
    {
        return $this->hasMany(SafeHouse::class);
    }

}
