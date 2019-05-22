<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingLoanCalculatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_loan_calculators', function (Blueprint $table) {
            $table->increments('id');
			$table->string('fullname')->nullable();
			$table->string('birthday')->nullable();
			$table->string('nationalid')->nullable();
			$table->string('phonenumber')->nullable();
			$table->integer('income_id')->nullable();
			$table->integer('district_id')->nullable();
			$table->integer('career_id')->nullable();
			$table->integer('loan_id')->nullable();
			$table->integer('loan_amount')->nullable();
			$table->integer('loan_tenure')->nullable();
			$table->string('status')->nullable();
			$table->text('description')->nullable();
			$table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('utm_content')->nullable();
            $table->string('lead_id')->nullable();
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
        Schema::dropIfExists('landing_loan_calculators');
    }
}
