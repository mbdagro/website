<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sister_projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id')->nullable();
            $table->text('title')->nullable();
            $table->text('logo', 191)->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('user_id')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sister_projects');
    }
};
