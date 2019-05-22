<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeInterestRateToLoanSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_setting', function (Blueprint $table) {
            $table->float('interest_rate', 8, 2)->nullable()->change(); // lãi suất
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
            $table->dropColumn('interest_rate');
        });
    }
}
