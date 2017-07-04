<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkCitiesLanguages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities_languages', function (Blueprint $table) {
            $table->foreign('city_id', 'fk_cities_languages_city')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('language_id', 'fk_cities_languages_lang')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities_languages', function (Blueprint $table) {
            $table->dropForeign('fk_cities_languages_city');
            $table->dropForeign('fk_cities_languages_lang');
        });
    }
}
