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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->double('note');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->string('type');
            $table->string('appreciation');
            $table->foreignId('student_id')->constrained('profiles')->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained('profiles')->onDelete('cascade');
            $table->string('semester');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
