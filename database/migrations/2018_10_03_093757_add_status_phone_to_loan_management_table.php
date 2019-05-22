<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusPhoneToLoanManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_management', function (Blueprint $table) {
            $table->tinyInteger('phone_status')->index()->nullable()->comment('1: Xác nhận; 0: Từ chối');
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
            $table->dropColumn('phone_status');
        });
    }
}
