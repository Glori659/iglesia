<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::connection('mysql')->hasTable('addresses'))
        {
            Schema::table('addresses', function ($table)
            {
                
            });     
        }
        elseif(!Schema::connection('mysql')->hasTable('addresses'))
        {
            Schema::create('addresses', function (Blueprint $table)
            {
                $table->increments('id');
                $table->integer('parish_id')->unsigned();
                $table->foreign('parish_id')->references('id')->on('parishes')->onDelete('cascade');
                $table->integer('city_id')->unsigned();
                $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
                $table->string('type_address');
                $table->string('address');
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
