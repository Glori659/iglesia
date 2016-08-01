<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::connection('mysql')->hasTable('cities'))
        {
            Schema::table('cities', function ($table)
            {
                
            });     
        }
        elseif(!Schema::connection('mysql')->hasTable('cities'))
        {
            Schema::create('cities', function (Blueprint $table)
            {
                $table->increments('id');
                $table->string('city');
                $table->integer('state_id')->unsigned();
                $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
                $table->tinyInteger('capital');
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
