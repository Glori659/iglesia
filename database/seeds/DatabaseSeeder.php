<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        //$this->call(ConfigurationsTableSeeder::class);

        Eloquent::unguard();
        $this->call(ProfessionsTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(MunicipalityTableSeeder::class);
        $this->call(ParishTableSeeder::class);
    }
}
