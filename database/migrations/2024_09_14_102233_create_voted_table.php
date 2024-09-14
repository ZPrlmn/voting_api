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
        Schema::create('voted', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->unsignedBigInteger('candidates_id');
            $table->unsignedBigInteger('position_id');
            $table->timestamps();

            $table->foreign('student_id')->references('student_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('candidates_id')->references('id')->on('candidates')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voted');
    }
};
