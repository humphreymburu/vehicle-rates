<?php

use App\Models\Vehicle\Fuel;
use Illuminate\Database\Seeder;

class FuelTableSeeder extends Seeder
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

        fuel::create([
            'id' => 1,
            'fuel_cost' => 103.88,
            'fuel_type' => 'DIESEL',
        ]);

        fuel::create([
            'id' => 2,
            'fuel_cost' => 115.39,
            'fuel_type' => 'PETROL',
        ]);



        $this->enableForeignKeys();
    }
}