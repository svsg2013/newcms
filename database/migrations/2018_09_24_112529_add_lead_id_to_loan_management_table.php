<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLeadIdToLoanManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_management', function (Blueprint $table) {
            $table->string('lead_id', 15)->unique()->comment('ts_lead_id ngẫu nhiên, unique, độ dài 15 kí tự');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loan_management', function (Blueprint $table) {
            $table->dropColumn('lead_id');
        });
    }
}
