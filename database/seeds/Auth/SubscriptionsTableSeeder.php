<?php

use App\Models\Vehicle\Subscriptions;
use Illuminate\Database\Seeder;

class SubscriptionsTableSeeder extends Seeder
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

        Subscriptions::create([
            'subscription_id' => 1,
            'subscription_cost' => 14000,
            'cat_id' => 1,
            'sub_id' => 1,
        ]);

        Subscriptions::create([
            'subscription_id' => 2,
            'subscription_cost' => 10000,
            'cat_id' => 2,
            'sub_id' => 2,
        ]);

        Subscriptions::create([
            'subscription_id' => 3,
            'subscription_cost' => 15000,
            'cat_id' => 3,
            'sub_id' => 3,
        ]);

        $this->enableForeignKeys();
    }
}