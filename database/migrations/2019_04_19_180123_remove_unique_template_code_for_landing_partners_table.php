<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUniqueTemplateCodeForLandingPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landing_partners', function (Blueprint $table) {
            $table->dropForeign('landing_partners_template_code_foreign');
            $table->dropUnique('landing_partners_template_code_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landing_partners', function (Blueprint $table) {
            $table->unique('template_code');
            $table->foreign('template_code')->references('code')->on('landing_templates')->onDelete('set null');
        });
    }
}
