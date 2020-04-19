<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('cleft')->nullable()->change();
            $table->integer('cright')->nullable()->change();
            $table->string('url')->nullable()->change();
            $table->string('path')->nullable()->change();
            $table->string('parent_id')->nullable()->change();
            $table->string('image')->nullable()->change();
            $table->integer('count_prod')->nullable()->change();
            $table->integer('sort')->nullable()->change();
            $table->boolean('active')->nullable()->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
}
