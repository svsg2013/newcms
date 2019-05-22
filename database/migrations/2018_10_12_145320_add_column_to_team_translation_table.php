<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToTeamTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_translation', function (Blueprint $table) {
            $table->string('job_value')->nullable();
            $table->string('favorite')->nullable();
            $table->text('content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team_translation', function (Blueprint $table) {
            $table->dropColumn('job_value');
            $table->dropColumn('favorite');
            $table->dropColumn('content');
        });
    }
}
