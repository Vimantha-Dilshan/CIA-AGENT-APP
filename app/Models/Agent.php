<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'gender',
        'address',
        'nationality',
        'passport_id',
        'notes',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function locations()
    {
        return $this->hasMany(Location::class, 'agent_in_charge');
    }

    public function safeHouses()
    {
        return $this->hasMany(SafeHouse::class, 'agent_in_charge');
    }

    public function weapons()
    {
        return $this->hasMany(WeaponInventory::class);
    }
}
