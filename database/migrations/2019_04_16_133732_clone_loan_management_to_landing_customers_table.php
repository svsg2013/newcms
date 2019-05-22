<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CloneLoanManagementToLandingCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_customers', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->integer('duration')->nullable();
            $table->bigInteger('monthly_payment')->nullable();
            $table->tinyInteger('active')->index()->nullable();
            $table->tinyInteger('phone_status')->index()->nullable();
            $table->smallInteger('status')->index()->nullable()->change();
            $table->unique('lead_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_customers', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('duration');
            $table->dropColumn('monthly_payment');
            $table->dropColumn('active');
            $table->dropColumn('phone_status');
            $table->dropIndex('landing_customers_lead_id_unique');
            $table->dropIndex('landing_customers_status_index');
            $table->string('status', 191)->nullable()->change();
        });
    }
}
