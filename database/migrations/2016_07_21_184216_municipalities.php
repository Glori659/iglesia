<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Municipalities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::connection('mysql')->hasTable('municipalities'))
        {
            Schema::table('municipalities', function ($table)
            {
                
            });     
        }
        elseif(!Schema::connection('mysql')->hasTable('municipalities'))
        {
            Schema::create('municipalities', function (Blueprint $table)
            {
                $table->increments('id');
                $table->string('municipality');
                $table->integer('state_id')->unsigned();
                $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
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
