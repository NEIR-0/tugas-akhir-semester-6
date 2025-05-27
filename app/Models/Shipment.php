<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $table = 'shipments';  // pastikan ini sesuai nama tabel di DB

    protected $fillable = [
        'tracking_number',
        'sender',
        'receiver',
        'status',
    ];

    // timestamps otomatis aktif, gak perlu set public $timestamps

    public function logs()
    {
        return $this->hasMany(ShipmentLog::class);
    }
}
