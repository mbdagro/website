<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_teams', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('name',191)->nullable();
				$table->string('designation',191)->nullable();
				$table->text('education')->nullable();
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
        Schema::dropIfExists('our_teams');
    }
}
