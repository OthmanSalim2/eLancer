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
        Schema::create('categories', function (Blueprint $table) {
            // id() represent unsigned bigint, auto_increment and primary
            $table->id();

            // string represent varchar, name varchar(255)
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            // art_path possible be image or icon
            $table->string('art_file')->nullable();
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('categories', 'id')
                ->nullOnDelete();
            /*other way
             $table->unsignedBigInteger('parent_id')->nullable();
             $table->foreign('parent_id')->references('id')->on('categories')->onDelete('restrict');
             */

            // timestamps make two columns created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
