<?php

use Illuminate\Database\Seeder;
use App\Models\Vehicle\Vehicle;

class VehiclesTableSeeder extends Seeder
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


        vehicle::create([
            'id' => 1,
            'purchase_cost' => 12904,
            'category' => 'super-loaded',
            'year_manufacture' => 2007,
            'fixed_cost' => 500000,
            'operating_cost' => 200000,
            'sub_id' => 3,
            'uuid' => ''
        ]);

        vehicle::create([
            'id' => 2,
            'purchase_cost' => 14904,
            'category' => 'super-loaded',
            'year_manufacture' => 2000,
            'fixed_cost' => 400000,
            'operating_cost' => 50000,
            'sub_id' => 2,
            'uuid' => ''
        ]);

        vehicle::create([
            'id' => 3,
            'purchase_cost' => 10000,
            'category' => 'super-loaded',
            'year_manufacture' => 2001,
            'fixed_cost' => 20000,
            'operating_cost' => 30000,
            'sub_id' => 3,
            'uuid' => ''
        ]);


        $this->enableForeignKeys();
    }

}