<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_general', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loan_income_type_id')->unsigned();
            $table->integer('loan_job_id')->unsigned();
            $table->integer('loan_setting_id')->unsigned();

            $table->foreign('loan_income_type_id')->references('id')->on('loan_income_type')->onDelete('cascade');
            $table->foreign('loan_job_id')->references('id')->on('loan_job')->onDelete('cascade');
            $table->foreign('loan_setting_id')->references('id')->on('loan_setting')->onDelete('cascade');
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
        Schema::dropIfExists('loan_general');
    }
}
