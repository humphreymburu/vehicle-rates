<?php

use App\Models\Vehicle\Capacity;
use Illuminate\Database\Seeder;

class CapacityTableSeeder extends Seeder
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

        capacity::create([
            'id' => 1,
            'engine_cc' => 'upto 1000',
            'car_id' => 1,
            'distance' => 20,
        ]);

        capacity::create([
            'id' => 2,
            'engine_cc' => 'upto 1000',
            'car_id' => 2,
            'distance' => 20,
        ]);

        capacity::create([
            'id' => 3,
            'engine_cc' => 'upto 850',
            'car_id' => 3,
            'distance' => 18,
        ]);

        capacity::create([
            'id' => 4,
            'engine_cc' => '850-1050',
            'car_id' => 4,
            'distance' => 16,
        ]);

        $this->enableForeignKeys();
    }
}