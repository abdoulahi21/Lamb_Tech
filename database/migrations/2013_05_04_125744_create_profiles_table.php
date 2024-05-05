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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birthday')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('phone');
            $table->string('status')->default('active');
            //$table->string('responsable_name')->nullable();
            $table->foreignId('schoolclass_id')
                ->nullable()
                ->constrained('school_classes')->onDelete('cascade');
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->string('month_paid')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
