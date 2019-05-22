<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateLandingPartnerTemplatesTable.
 */
class CreateLandingPartnerTemplatesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('landing_partner_templates', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('partner_id')->unique();
            $table->longText('meta_data')->nullable();
            $table->timestamps();
            $table->foreign('partner_id')->references('id')->on('landing_partners')->onDelete('cascade');
		});

        Schema::create('landing_partner_template_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('landing_partner_template_id');
            $table->string('locale', 10)->index();
            $table->longText('extra_data')->nullable();

            $table->unique(['landing_partner_template_id', 'locale'], 'landing_partner_template_translations_unique_locale');

            $table->foreign('landing_partner_template_id', 'landing_partner_template_translations_foreign')->references('id')->on('landing_partner_templates')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('landing_partner_template_translations');
		Schema::dropIfExists('landing_partner_templates');
	}
}
