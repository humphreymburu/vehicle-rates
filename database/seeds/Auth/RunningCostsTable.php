<?php

use App\Models\Vehicle\Running_Cost;
use Illuminate\Database\Seeder;

class RunningCostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        running_cost::create([
            'id' => 1,
            'fuel_cost' => 9.73,
            'oil_cost' => 0.66,
            'service_cost' => 5.58,
            'repairs_cost' => 1.6,
            'tyre_tube' => 10.49,
            'capacity_id' => 1,
        ]);

        running_cost::create([
            'id' => 2,
            'fuel_cost' => 9.04,
            'oil_cost' => 1.08,
            'service_cost' => 3.23,
            'repairs_cost' => 8.92,
            'tyre_tube' => 3.35,
            'capacity_id' => 2,
        ]);

        running_cost::create([
            'id' => 3,
            'fuel_cost' => 12.97,
            'oil_cost' => 0.93,
            'service_cost' => 3.35,
            'repairs_cost' => 10.34,
            'tyre_tube' => 3.35,
            'capacity_id' => 3,
        ]);

        $this->enableForeignKeys();
    }
}