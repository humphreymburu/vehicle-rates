<?php

use App\Models\Vehicle\Oil;
use Illuminate\Database\Seeder;

class OilTableSeeder extends Seeder
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

        oil::create([
            'id' => 1,
            'oil_cost' => 0.36,
            'capacity_id' => 1,
        ]);

        oil::create([
            'id' => 2,
            'oil_cost' => 0.306,
            'capacity_id' => 2,
        ]);

        oil::create([
            'id' => 3,
            'oil_cost' => 0.378,
            'capacity_id' => 3,
        ]);

        oil::create([
            'id' => 4,
            'oil_cost' => 0.508,
            'capacity_id' => 4,
        ]);

        oil::create([
            'id' => 5,
            'oil_cost' => 0.576,
            'capacity_id' => 5,
        ]);

        oil::create([
            'id' => 6,
            'oil_cost' => 0.45,
            'capacity_id' => 6,
        ]);

        $this->enableForeignKeys();
    }
}