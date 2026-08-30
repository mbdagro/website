<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_managements', function (Blueprint $table) {
            $table->bigIncrements('id')->index();		
			$table->string('logo', 191)->nullable();
			$table->string('background_image', 191)->nullable();
			$table->text('company_name')->nullable();
			$table->text('slogan')->nullable();	
			$table->text('address')->nullable();	
			$table->text('welcome_title')->nullable();	
			$table->text('welcome_description')->nullable();	
			$table->string('welcome_image', 191)->nullable();			
			$table->text('email')->nullable();		
			$table->text('contact_no')->nullable();		
			$table->text('youtube_vedio_url')->nullable();		
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
        Schema::dropIfExists('home_managements');
    }
}
