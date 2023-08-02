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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            // here possible be there contract without proposal
            $table->foreignId('proposal_id')->unique()->nullable()->constrained('proposals')->nullOnDelete();
            $table->foreignId('freelancer_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
            $table->unsignedFloat('cost');
            $table->enum('type', ['hourly', 'fixed']);
            // here mean will start the contract
            $table->date('start_on');
            // here mean will finished the contract
            $table->date('end_on');
            // here mean is it completed the contract
            $table->date('completed_on')->nullable();
            $table->unsignedFloat('hours')->nullable()->default(0);
            $table->enum('status', ['active', 'completed', 'terminated']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
