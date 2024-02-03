<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WeaponInventory extends Model
{
    use HasFactory;

    protected $table = 'weapons_inventory';

    protected $fillable = [
        'name',
        'weapon_code',
        'bullet_type',
        'agent_id',
        'manufacturer',
        'purchase_date',
        'history',
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
