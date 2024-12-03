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
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('subject_id'); // Foreign key to subjects table
            // $table->string('subject_name');
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade'); // Foreign key to 'users' table (teachers)
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('status');

            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
