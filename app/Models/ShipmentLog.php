<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'location',
        'status',
        'timestamp'
    ];

    public $timestamps = false;

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
