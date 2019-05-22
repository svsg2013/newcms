<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToCareerApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('career_apply', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birthday')->nullable();
            $table->tinyInteger('gender')->index()->nullable();
            $table->string('cccd')->nullable();
            $table->integer('ward_id')->nullable();
            $table->string('address')->nullable();
            $table->string('reference')->nullable();
            $table->string('image')->nullable();
            $table->string('latest_work')->nullable();
            $table->string('latest_position')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('career_apply', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('birthday');
            $table->dropColumn('gender');
            $table->dropColumn('cccd');
            $table->dropColumn('ward_id');
            $table->dropColumn('address');
            $table->dropColumn('reference');
            $table->dropColumn('image');
            $table->dropColumn('latest_work');
            $table->dropColumn('latest_position');
        });
    }
}
