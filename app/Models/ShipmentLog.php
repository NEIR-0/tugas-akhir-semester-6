<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentLog extends Model
{
    use HasFactory;

    protected $table = 'shipment_logs';  // pastikan ini sesuai nama tabel

    protected $fillable = [
        'shipment_id',
        'location',
        'status',
    ];

    // timestamps otomatis aktif, jangan set public $timestamps = false;

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
