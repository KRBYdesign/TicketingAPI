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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            // Tie each ticket to a created user
            $table->bigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');

            // Assign tickets to users
            $table->bigInteger('assigned_to');
            $table->foreign('assigned_to')->references('id')->on('users');

            // The details for each ticket
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('due_date');
            $table->timestamp('resolved_date')->nullable();
            $table->integer('priority')->default(0);

            // Created and updated timestamp
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('modified_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
