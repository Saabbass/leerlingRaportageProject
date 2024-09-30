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
        // Create the 'users' table first
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // Ensure this line is present
            $table->string('last_name');  // Ensure this line is present
            $table->integer('age');       // Ensure this line is present
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');       // Add role
            $table->rememberToken();
            $table->timestamps();
        });

        // Create the 'password_reset_tokens' table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Create the 'sessions' table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'sessions' table first
        Schema::dropIfExists('sessions');

        // Drop the 'password_reset_tokens' table
        Schema::dropIfExists('password_reset_tokens');

        // Drop the 'users' table
        Schema::dropIfExists('users');
    }
};
