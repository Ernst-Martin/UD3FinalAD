<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('assignment_id')->constrained()->onDelete('cascade');
            $table->float('score');
            $table->text('comments')->nullable();
            $table->timestamps();
            // Un estudiante solo puede tener una calificación por tarea
            $table->unique(['user_id', 'assignment_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};