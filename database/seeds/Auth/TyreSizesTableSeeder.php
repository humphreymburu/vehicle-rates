<?php

use App\Models\Vehicle\Tyre_sizes;
use Illuminate\Database\Seeder;

class TyreSizesTableSeeder extends Seeder
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

        Tyre_sizes::create([
            'size' => '',
            'tyre_type' => '155*12',
            'tyre_no' => 5,
            'km_tyre' => 35000,
            'vehicles_id' => 1,
        ]);

        Tyre_sizes::create([
            'size' => '',
            'tyre_type' => '700*15',
            'tyre_no' => 5,
            'km_tyre' => 30000,
            'vehicles_id' => 2,
        ]);

        Tyre_sizes::create([
            'size' => '',
            'tyre_type' => '165*13',
            'tyre_no' => 5,
            'km_tyre' => 30000,
            'vehicles_id' => 3,
        ]);

        $this->enableForeignKeys();
    }
}
