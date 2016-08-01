<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class States extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::connection('mysql')->hasTable('states'))
        {
            Schema::table('states', function ($table)
            {
                
            });     
        }
        elseif(!Schema::connection('mysql')->hasTable('states'))
        {
            Schema::create('states', function (Blueprint $table)
            {
                $table->increments('id');
                $table->string('state');
                $table->integer('country_id')->unsigned();
                $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
                $table->string('iso_3166-2');
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
