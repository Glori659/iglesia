<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Countries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::connection('mysql')->hasTable('countries'))
        {
            Schema::table('countries', function ($table)
            {
                
            });     
        }
        elseif(!Schema::connection('mysql')->hasTable('countries'))
        {
            Schema::create('countries', function (Blueprint $table)
            {
                $table->increments('id');
                $table->string('country');
                $table->string('iso_3166-1');
                //Auditoria de Usuarios
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
