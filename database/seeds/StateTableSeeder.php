<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* States */
		App\State::create(array( 'id' => 1, 'state' => 'Amazonas','country_id' => 1, 'iso_3166-2'=> 'VE-X'  ));
		App\State::create(array( 'id' => 2, 'state' => 'Anzoátegui','country_id' => 1, 'iso_3166-2'=> 'VE-B'  ));
		App\State::create(array( 'id' => 3, 'state' => 'Apure','country_id' => 1, 'iso_3166-2'=> 'VE-C'  ));
		App\State::create(array( 'id' => 4, 'state' => 'Aragua','country_id' => 1, 'iso_3166-2'=> 'VE-D'  ));
		App\State::create(array( 'id' => 5, 'state' => 'Barinas','country_id' => 1, 'iso_3166-2'=> 'VE-E'  ));
		App\State::create(array( 'id' => 6, 'state' => 'Bolívar','country_id' => 1, 'iso_3166-2'=> 'VE-F'  ));
		App\State::create(array( 'id' => 7, 'state' => 'Carabobo','country_id' => 1, 'iso_3166-2'=> 'VE-G'  ));
		App\State::create(array( 'id' => 8, 'state' => 'Cojedes','country_id' => 1, 'iso_3166-2'=> 'VE-H'  ));
		App\State::create(array( 'id' => 9, 'state' => 'Delta Amacuro','country_id' => 1, 'iso_3166-2'=> 'VE-Y'  ));
		App\State::create(array( 'id' => 10, 'state' => 'Falcón','country_id' => 1, 'iso_3166-2'=> 'VE-I'  ));
		App\State::create(array( 'id' => 11, 'state' => 'Guárico','country_id' => 1, 'iso_3166-2'=> 'VE-J'  ));
		App\State::create(array( 'id' => 12, 'state' => 'Lara','country_id' => 1, 'iso_3166-2'=> 'VE-K'  ));
		App\State::create(array( 'id' => 13, 'state' => 'Mérida','country_id' => 1, 'iso_3166-2'=> 'VE-L'  ));
		App\State::create(array( 'id' => 14, 'state' => 'Miranda','country_id' => 1, 'iso_3166-2'=> 'VE-M'  ));
		App\State::create(array( 'id' => 15, 'state' => 'Monagas','country_id' => 1, 'iso_3166-2'=> 'VE-N'  ));
		App\State::create(array( 'id' => 16, 'state' => 'Nueva Esparta','country_id' => 1, 'iso_3166-2'=> 'VE-O'  ));
		App\State::create(array( 'id' => 17, 'state' => 'Portuguesa','country_id' => 1, 'iso_3166-2'=> 'VE-P'  ));
		App\State::create(array( 'id' => 18, 'state' => 'Sucre','country_id' => 1, 'iso_3166-2'=> 'VE-R'  ));
		App\State::create(array( 'id' => 19, 'state' => 'Táchira','country_id' => 1, 'iso_3166-2'=> 'VE-S'  ));
		App\State::create(array( 'id' => 20, 'state' => 'Trujillo','country_id' => 1, 'iso_3166-2'=> 'VE-T'  ));
		App\State::create(array( 'id' => 21, 'state' => 'Vargas','country_id' => 1, 'iso_3166-2'=> 'VE-W'  ));
		App\State::create(array( 'id' => 22, 'state' => 'Yaracuy','country_id' => 1, 'iso_3166-2'=> 'VE-U'  ));
		App\State::create(array( 'id' => 23, 'state' => 'Zulia','country_id' => 1, 'iso_3166-2'=> 'VE-V'  ));
		App\State::create(array( 'id' => 24, 'state' => 'Distrito Capital','country_id' => 1, 'iso_3166-2'=> 'VE-A'  ));
		App\State::create(array( 'id' => 25, 'state' => 'Dependencias Federales','country_id' => 1, 'iso_3166-2'=> 'VE-Z'  ));
    }
}
