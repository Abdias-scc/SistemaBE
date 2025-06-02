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
        Schema::create('beca_soli', function (Blueprint $table) {
            $table->id('id_beca_soli');
            $table->foreignId('id_persona')->references('id_persona')->on('persona')->onDelete('cascade');
            $table->foreignId('id_jornada_beca')->references('id_jornada_beca')->on('jornada_beca')->onDelete('cascade');
            $table->date('fecha_soli');
            $table->string('estado_soli');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beca_soli');
    }
};
