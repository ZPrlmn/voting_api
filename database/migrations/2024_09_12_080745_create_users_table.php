<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('student_id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('year');
            $table->string('course');
            $table->string('department');
            $table->boolean('has_voted');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
