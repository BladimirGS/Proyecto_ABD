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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('clave');
            $table->string('semestre');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('carrera_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('materia_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('periodo_id')->nullable()->constrained()->nullOnDelete();
            $table->string('color');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
