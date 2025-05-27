<?php

namespace Database\Factories;

use App\Models\ShipmentLog;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ShipmentLogFactory extends Factory
{
    protected $model = ShipmentLog::class;

    public function definition(): array
    {
        return [
            'shipment_id' => Shipment::factory(), // hubungan ke tabel shipment
            'location' => $this->faker->city(),
            'status' => $this->faker->randomElement([
                'Paket diterima di gudang',
                'Dalam pengiriman',
                'Menuju lokasi tujuan',
                'Tertunda karena cuaca',
                'Sampai di lokasi',
            ]),
            'timestamp' => $this->faker->dateTimeBetween('-5 days', 'now'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
