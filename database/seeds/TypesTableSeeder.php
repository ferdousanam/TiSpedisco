<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create(['title' => 'Envelop']);
        Type::create(['title' => 'Box']);
        Type::create(['title' => 'Others']);
    }
}
