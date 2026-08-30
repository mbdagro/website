<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGallariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallaries', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->bigInteger('category_id')->nullable();
				$table->string('name',191)->nullable();
				$table->string('title',191)->nullable();
				$table->text('sort_des')->nullable();
				$table->text('long_des')->nullable();
				$table->enum('type', array('gallary', 'slider'))->nullable();
				$table->string('image', 191)->nullable();
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
        Schema::dropIfExists('gallaries');
    }
}
