<?php

use Illuminate\Database\Seeder;

class CarriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Carrier::class, 50)->create();
    }
}
