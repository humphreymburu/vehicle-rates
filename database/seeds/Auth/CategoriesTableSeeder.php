<?php

use App\Models\Vehicle\Categories;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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

        categories::create([
            'category_id' => 1,
            'membership_category' => 'Premier',
        ]);

        categories::create([
            'category_id' => 2,
            'membership_category' => 'Classic',
        ]);

        categories::create([
            'category_id' => 3,
            'membership_category' => 'prestige',
        ]);

        $this->enableForeignKeys();
    }
}