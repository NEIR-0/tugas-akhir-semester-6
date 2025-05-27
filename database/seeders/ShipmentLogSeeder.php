<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShipmentLog;

class ShipmentLogSeeder extends Seeder
{
    public function run(): void
    {
        ShipmentLog::factory()->count(100)->create();
    }
}
