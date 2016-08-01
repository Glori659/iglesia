<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Country::create(array( 'id' => 1, 'country' => 'Venezuela', 'iso_3166-1'=> 'VE' ));
    }
}
