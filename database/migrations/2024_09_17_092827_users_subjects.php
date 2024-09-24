<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users_subjects', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->unsignedBigInteger('subject_id'); // Foreign key to subjects table

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');

            $table->primary(['user_id', 'subject_id']); // Composite primary key
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_subjects');
    }
};