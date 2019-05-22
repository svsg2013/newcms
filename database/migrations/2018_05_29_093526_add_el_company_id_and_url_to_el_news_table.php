<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddElCompanyIdAndUrlToElNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('el_news', function (Blueprint $table) {
            $table->integer('el_company_id')->unsigned();
            $table->string('url')->nullable();
            $table->foreign('el_company_id')->references('id')->on('el_company')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('el_news', function (Blueprint $table) {
            $table->dropColumn('el_company_id');
            $table->dropColumn('url');
        });
    }
}
