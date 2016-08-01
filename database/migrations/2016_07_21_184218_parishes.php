<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Parishes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::connection('mysql')->hasTable('parishes'))
        {
            Schema::table('parishes', function ($table)
            {
                
            });     
        }
        elseif(!Schema::connection('mysql')->hasTable('parishes'))
        {
            Schema::create('parishes', function (Blueprint $table)
            {
                $table->increments('id');
                $table->string('parish');
                $table->integer('municipality_id')->unsigned();
                $table->foreign('municipality_id')->references('id')->on('municipalities')->onDelete('cascade');
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
