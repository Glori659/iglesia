<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddressPerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::connection('mysql')->hasTable('address_person'))
        {
            Schema::table('address_person', function ($table)
            {
                
            });     
        }
        elseif(!Schema::connection('mysql')->hasTable('address_person'))
        {
            Schema::create('address_person', function (Blueprint $table)
            {
                $table->increments('id');
                $table->integer('address_id')->unsigned();
                $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
                $table->integer('person_id')->unsigned();
                $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
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
