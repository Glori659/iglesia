<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Children extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table)
            {
                $table->integer('child_id')->unsigned();
                $table->foreign('child_id')->references('id')->on('people')->onDelete('cascade');
                $table->integer('representative_id')->unsigned();
                $table->foreign('representative_id')->references('id')->on('people')->onDelete('cascade');
                $table->string('type_relationship');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
