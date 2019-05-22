<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnApiToLoanSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_setting', function (Blueprint $table) {
            $table->string('template_id')->nullable()->comment('Offer Template ID');
            $table->string('partner_id')->nullable()->comment('Partner ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loan_setting', function (Blueprint $table) {
            $table->dropColumn('template_id');
            $table->dropColumn('partner_id');
        });
    }
}
