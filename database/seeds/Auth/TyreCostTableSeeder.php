<?php

use Illuminate\Database\Seeder;
use App\Models\Vehicle\tyre_costs;

class TyreCostTableSeeder extends Seeder
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


        tyre_costs::create([
            'tyre_sizes_id' => 1,
            'tyre_cost' => 6232,
        ]);

        tyre_costs::create([
            'tyre_sizes_id' => 2,
            'tyre_cost' => 14904,
        ]);

        tyre_costs::create([
            'tyre_sizes_id' => 3 ,
            'tyre_cost' => 7724,
        ]);

        $this->enableForeignKeys();
    }

}
