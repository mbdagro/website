<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateAttachmentsTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('attachments', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('filename')->nullable();
				$table->string('extention')->nullable();
				$table->string('filesize')->nullable();
				$table->string('location')->nullable();
				$table->string('comments')->nullable();
				$table->text('file_des')->nullable();
				$table->bigInteger('order_id')->nullable()->index();	
				$table->bigInteger('user_id')->nullable()->index();	
				$table->bigInteger('order_by')->nullable()->index();	
				$table->enum('status', array('Active', 'Inactive','Cancel'))->nullable();
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
			Schema::dropIfExists('attachments');
		}
	}
