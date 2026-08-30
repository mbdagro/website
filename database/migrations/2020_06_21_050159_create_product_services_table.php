<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sub_category_id')->nullable();
            $table->string('code', 191)->nullable();
            $table->string('name', 191)->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('image', 191)->nullable();
            $table->string('image1', 191)->nullable();
            $table->string('image2', 191)->nullable();
            $table->string('image3', 191)->nullable();
            $table->string('image4', 191)->nullable();
            $table->string('price', 191)->nullable();
            $table->string('built_year', 191)->nullable();
            $table->string('available_from', 191)->nullable();
            $table->string('flo0r', 191)->nullable();
            $table->string('address', 191)->nullable();
            $table->bigInteger('user_id')->nullable()->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_services');
    }
}