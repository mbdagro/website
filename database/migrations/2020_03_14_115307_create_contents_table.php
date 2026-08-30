<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
				$table->bigIncrements('id')->index();
				$table->string('type')->nullable();
				$table->string('name')->nullable();
				$table->string('title')->nullable();
				$table->text('sort_des')->nullable();
				$table->text('long_des')->nullable();
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
        Schema::dropIfExists('contents');
    }
}
