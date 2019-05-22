<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToLoanManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_management', function (Blueprint $table) {
            $table->tinyInteger('status')->index()->nullable()->comment('0: Đăng ký ngay; 1: Đặt lịch gọi ngay');
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
            $table->dropColumn('status');
        });
    }
}
