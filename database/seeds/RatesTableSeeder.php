<?php

use Illuminate\Database\Seeder;

class RatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carriers = \App\Carrier::all();
        foreach ($carriers as $carrier) {
            $distance_from = 0;
            for ($i = 0; $i < 5; $i++) {
                $rate = array(
                    'distance_from' => ($i == 0) ? $distance_from : $distance_from += 1,
                    'distance_to' => ($i == 0) ? $distance_from = $distance_from + 5 : $distance_from = $distance_from + 4,
                    'weight_from' => 0,
                    'weight_to' => 50,
                    'length_from' => 0,
                    'length_to' => 0,
                    'width_from' => 0,
                    'width_to' => 0,
                    'height_from' => 0,
                    'height_to' => 0,
                    'volume' => 200,
                    'price' => rand(5, 1000),
                    'estimate_time' => 'Between 1 and ' . rand(2, 30) . ' days of delivery',
                    'vat' => rand(0, 15),
                    'type_id' => 1,
                    'carrier_id' => $carrier->id,
                );
                \App\Rate::create($rate);
            }
            $distance_from = 0;
            for ($i = 0; $i < 5; $i++) {
                $rate = array(
                    'distance_from' => ($i == 0) ? $distance_from : $distance_from += 1,
                    'distance_to' => ($i == 0) ? $distance_from = $distance_from + 5 : (($i == 4) ? 999999999999999 : $distance_from = $distance_from + 4),
                    'weight_from' => 0,
                    'weight_to' => 50,
                    'length_from' => 0,
                    'length_to' => 0,
                    'width_from' => 0,
                    'width_to' => 0,
                    'height_from' => 0,
                    'height_to' => 0,
                    'volume' => 999999999999999,
                    'price' => rand(5, 1000),
                    'estimate_time' => 'Between 1 and ' . rand(2, 30) . ' days of delivery',
                    'vat' => rand(0, 15),
                    'type_id' => 1,
                    'carrier_id' => $carrier->id,
                );
                \App\Rate::create($rate);
            }
        }
    }
}
