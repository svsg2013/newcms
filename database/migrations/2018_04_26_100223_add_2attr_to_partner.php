<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add2attrToPartner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partner', function (Blueprint $table) {
            $table->integer('country_id')->default(0)->after('photo')->index();
            $table->integer('business_id')->default(0)->after('photo')->index();
        });
    }

    /**
     * Reverse the migrationss.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partner', function (Blueprint $table) {
            $table->dropColumn('country_id');
            $table->dropColumn('business_id');
        });
    }
}
