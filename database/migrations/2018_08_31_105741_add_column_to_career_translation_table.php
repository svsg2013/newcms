<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToCareerTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('career_translation', function (Blueprint $table) {
            $table->bigInteger('salary')->nullable();
            $table->string('working_form')->nullable();
            $table->text('description')->nullable();
            $table->text('request')->nullable();
            $table->text('benefit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('career_translation', function (Blueprint $table) {
            $table->dropColumn('salary');
            $table->dropColumn('working_form');
            $table->dropColumn('description');
            $table->dropColumn('request');
            $table->dropColumn('benefit');
        });
    }
}
