<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // role_id as the primary key
            $table->string('role_name', 50);
            $table->timestamps(); // adds created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
