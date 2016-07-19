<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActivityUserCandidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('candidates', 'edited_by') && !Schema::hasColumn('candidates', 'deleted_by'))
        {
            Schema::table('candidates', function ($table)
            {
                $table->integer('edited_by')->nullable()->after('user_id');
                $table->foreign('edited_by')->references('id')->on('users')->onDelete('cascade');
                $table->integer('deleted_by')->nullable()->after('edited_by');
                $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');

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
        //
    }
}
