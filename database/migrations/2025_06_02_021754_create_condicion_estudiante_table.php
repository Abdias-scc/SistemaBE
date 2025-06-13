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
        Schema::create('condicion_estudiante', function (Blueprint $table) {
            $table->id('id_condicion_estudiante');
            $table->string('nombre_condicion_e');
            $table->foreignId('id_persona')->references('id_persona')->on('persona')->onDelete('cascade');
            $table->foreignId('id_perfil')->references('id_perfil')->on('perfil')->onDelete('cascade');
            $table->string('lapso_inscripcion');
            $table->timestamps();
            $table->foreignId('id_lapso_academico')->references('id_lapso_academico')->on('lapso_academico')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('condicion_estudiante');
    }
};
