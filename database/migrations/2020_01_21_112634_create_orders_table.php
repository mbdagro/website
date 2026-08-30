<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateOrdersTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('orders', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('order_subject')->nullable();
				$table->string('order_qty')->nullable();
				$table->text('order_des')->nullable();
				$table->enum('order_type', array('Order', 'Quote'))->nullable();
				$table->bigInteger('order_by')->nullable()->index();
				$table->bigInteger('user_id')->nullable()->index();	
				$table->enum('status', array('New', 'Download','Print','Waiting','Complete'))->nullable();
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
			Schema::dropIfExists('orders');
		}
	}
