<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name')->nullable()->change();
            $table->string('article')->nullable()->change();
            $table->string('code')->nullable()->change();
            $table->integer('category_id')->nullable()->change();
            $table->integer('brand_id')->nullable()->change();
            $table->integer('quantity')->nullable()->change();
            $table->string('url')->nullable()->change();
            $table->string('path')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('preview')->nullable()->change();
            $table->boolean('active')->nullable()->change();
            $table->boolean('is_new')->nullable()->change();
            $table->integer('discount')->nullable()->change();
            $table->boolean('disallow_order')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
