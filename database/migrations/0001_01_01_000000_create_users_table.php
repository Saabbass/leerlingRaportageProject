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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

       

        // Modify the existing 'users' table to include additional fields
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->after('name');
            $table->string('last_name')->after('first_name');
            $table->date('date_of_birth')->nullable()->after('password');
            $table->string('address')->nullable()->after('date_of_birth');
            $table->unsignedBigInteger('role_id')->after('address');

            // Foreign key constraint for role_id
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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

        // Drop the 'roles' table
        Schema::dropIfExists('roles');

        // Revert changes to the 'users' table
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn(['first_name', 'last_name', 'date_of_birth', 'address', 'role_id']);
        });

        // Drop the 'users' table
        Schema::dropIfExists('users');
    }
};
