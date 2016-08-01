<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Group::create(array('name' => 'Casas de Paz','user_id' => 1,'type'=>'Nucleo'));
		App\Group::create(array('name' => 'Escuela Dominical','user_id' => 1,'type'=>'Nucleo'));
        App\Group::create(array('name' => 'Escuela Ministerial ','user_id' => 1,'type'=>'Nucleo'));
        App\Group::create(array('name' => 'Administrativo ','user_id' => 1,'type'=>'Departamento'));
        App\Group::create(array('name' => 'Conserjeria ','user_id' => 1,'type'=>'Departamento'));
		App\Group::create(array('name' => 'Protocolo ','user_id' => 1,'type'=>'Departamento'));
    }
}
