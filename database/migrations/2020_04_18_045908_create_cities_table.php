<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('city_name');
            $table->string('obl_name');
            $table->string('center');
            $table->string('nal_sum_limit');
            $table->string('eng_name');
            $table->string('post_code_list');
            $table->string('eng_full_name');
            $table->string('eng_obl_name');
            $table->string('country_code');
            $table->string('country_name');
            $table->string('eng_country_name');
            $table->string('full_name_fias');
            $table->string('fias');
            $table->string('cladr');
            $table->string('city_dd');
            $table->string('pvz_code');
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
        Schema::table('cities', function (Blueprint $table) {
            //
        });
    }
}
