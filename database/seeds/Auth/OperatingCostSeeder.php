<?php

use Illuminate\Database\Seeder;
use App\Models\Vehicle\Operations;

class OperatingCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    use DisableForeignKeys;

    public function run()
    {
        $this->disableForeignKeys();


        Operations::create([
            'id' => 1,
            'tyre_cost' => 0.89,
            'services_cost' => 1.68,
            'repair_cost' =>  3.408,
            'drive' => '2WD-P-PETROL',
            'capacity_id' => 1,
            'fuel' => 'PETROL',
            'fuel_id' => 1,
        ]);

        Operations::create([
            'id' => 2,
            'tyre_cost' => 2.484,
            'services_cost' => 1.439,
            'repair_cost' =>  3.091,
            'drive' => '4WD-PETROL',
            'capacity_id' => 2,
            'fuel' => 'PETROL',
            'fuel_id' => 1,
        ]);

        Operations::create([
            'id' => 3,
            'tyre_cost' => 1.287,
            'services_cost' => 1.14,
            'repair_cost' =>  2.464,
            'drive' => 'SALOON',
            'capacity_id' => 3,
            'fuel' => 'PETROL',
            'fuel_id' => 1,
        ]);

        Operations::create([
            'id' => 4,
            'tyre_cost' => 1.287,
            'services_cost' => 1.199,
            'repair_cost' =>  3.091,
            'drive' => 'SALOON',
            'capacity_id' => 4,
            'fuel' => 'PETROL',
            'fuel_id' => 1,
        ]);

        Operations::create([
            'id' => 5,
            'tyre_cost' => 1.287,
            'services_cost' => 1.199,
            'repair_cost' =>  3.091,
            'drive' => 'SALOON',
            'capacity_id' => 5,
            'fuel' => 'PETROL',
            'fuel_id' => 1,
        ]);

        Operations::create([
            'id' => 6,
            'tyre_cost' => 1.312,
            'services_cost' => 1.477,
            'repair_cost' =>  4.334,
            'drive' => 'SALOON',
            'capacity_id' => 6,
            'fuel' => 'DIESEL',
            'fuel_id' => 2,
        ]);

        $this->enableForeignKeys();
    }

}