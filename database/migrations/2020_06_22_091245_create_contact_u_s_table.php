<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_u_s', function (Blueprint $table) {
            $table->bigIncrements('id');
				$table->string('full_name',191)->nullable();
				$table->string('phone',191)->nullable();
				$table->string('email')->nullable();
				$table->text('address')->nullable();
				$table->text('order_details')->nullable();
				$table->string('image', 191)->nullable();
				$table->bigInteger('product_serivice_id')->nullable();	
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
        Schema::dropIfExists('contact_u_s');
    }
}
