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
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            // here store the name of queue
            $table->string('queue')->index();
            // payload it's represent the data of job class
            $table->longText('payload');
            // it's represent the number of times
            $table->unsignedTinyInteger('attempts');
            // reserved_at it's represent when reserved this data
            $table->unsignedInteger('reserved_at')->nullable();
            // it's represent when will execute this data?
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
