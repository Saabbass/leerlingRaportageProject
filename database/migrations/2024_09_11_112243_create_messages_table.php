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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id(); // Primary key for the announcements table
            $table->unsignedBigInteger('user_id'); // ID of the user who created the announcement
            $table->string('title'); // Title of the announcement
            $table->text('content'); // Content of the announcement
            $table->unsignedBigInteger('sent_by'); // ID of the user who the announcement was sent by
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sent_by')->references('id')->on('users')->onDelete('cascade'); // Add sent_by column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};