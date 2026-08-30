<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_events', function (Blueprint $table) {
            	$table->bigIncrements('id');
				$table->string('name',191)->nullable();
				$table->string('title',191)->nullable();
				$table->date('news_event_date')->nullable();
				$table->text('description')->nullable();
				$table->string('image', 191)->nullable();
				$table->string('is_pop_up')->nullable();
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
        Schema::dropIfExists('news_events');
    }
}
