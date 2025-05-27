<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    // override nama tabel default
    protected $table = 'shipment';

    protected $fillable = [
        'tracking_number',
        'sender',
        'receiver',
        'status'
    ];

    public function logs()
    {
        return $this->hasMany(ShipmentLog::class);
    }
}
