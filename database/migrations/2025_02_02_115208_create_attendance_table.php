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
    Schema::create('attendances', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('subject_id')->constrained()->onDelete('cascade');
        $table->date('date');
        $table->boolean('present')->default(false);
        $table->timestamps();
        // Un estudiante solo puede tener un registro de asistencia por asignatura y día
        $table->unique(['user_id', 'subject_id', 'date']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
