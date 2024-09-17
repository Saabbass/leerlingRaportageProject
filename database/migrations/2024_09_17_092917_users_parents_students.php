<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_parent_student', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id'); // Foreign key to users (parents)
            $table->unsignedBigInteger('student_id'); // Foreign key to users (students)

            $table->foreign('parent_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['parent_id', 'student_id']); // Composite primary key
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_parent_student');
    }
};
