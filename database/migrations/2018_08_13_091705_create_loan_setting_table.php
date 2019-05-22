<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_setting', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('interest_rate')->nullable(); // lãi suất
            $table->bigInteger('min_money')->nullable(); // số tiền vay tối thiểu
            $table->bigInteger('max_money')->nullable(); // số tiền vay tối đa
            $table->integer('min_borrow_time')->nullable(); // thời gian vay tối thiểu
            $table->integer('max_borrow_time')->nullable(); // thời gian vay tối đa
            $table->double('coefficient', 8, 2)->default(1.06); // hệ số trong công thức
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
        Schema::dropIfExists('loan_setting');
    }
}
