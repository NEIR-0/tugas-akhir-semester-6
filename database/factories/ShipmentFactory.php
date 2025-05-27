<?php

namespace Database\Factories;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ShipmentFactory extends Factory
{
    protected $model = Shipment::class;

    public function definition(): array
    {
        return [
            'tracking_number' => 'RESI' . $this->faker->unique()->numerify('##########'),
            'sender' => $this->faker->company(),
            'receiver' => $this->faker->name(),
            'status' => $this->faker->randomElement(['Dalam Perjalanan', 'Terkirim', 'Diproses', 'Dibatalkan']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
