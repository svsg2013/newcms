<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname', 191)->nullable();
            $table->string('birthday', 191)->nullable();
            $table->string('nationalid', 191)->nullable();
            $table->string('phonenumber', 191)->nullable();
            $table->unsignedInteger('income_id')->nullable();
            $table->unsignedInteger('district_id')->nullable();
            $table->unsignedInteger('career_id')->nullable();
            $table->unsignedInteger('loan_id')->nullable();
            $table->unsignedInteger('loan_amount')->nullable();
            $table->unsignedInteger('loan_tenure')->nullable();
            $table->string('status', 191)->nullable();
            $table->text('description')->nullable();
            $table->string('utm_source', 191)->nullable();
            $table->string('utm_medium', 191)->nullable();
            $table->string('utm_campaign', 191)->nullable();
            $table->string('utm_content', 191)->nullable();
            $table->string('lead_id', 191)->nullable();
            $table->text('url')->nullable();
            $table->string('site', 10)->nullable();
            $table->text('aff_sid', 10)->nullable();
            $table->string('partner_code', 10)->nullable();

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
        Schema::dropIfExists('landing_customers');
    }
}
