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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description');
            $table->date('due_date');
            $table->string('status');
            $table->boolean('completed')->default(false)->nullable();
            $table->foreignId('teacher_id')->constrained('profiles')->onDelete('cascade');
            $table->foreignId('schoolClass_id')->constrained('school_classes')->onDelete('cascade');
            $table->string('exo_file')->nullable();
            $table->string('correction_file')->nullable();
            $table->string('rendu_file')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
