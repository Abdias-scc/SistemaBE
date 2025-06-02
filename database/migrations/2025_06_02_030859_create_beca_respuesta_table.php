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
        Schema::create('beca_respuesta', function (Blueprint $table) {
            $table->id('id_beca_respuesta');
            $table->foreignId('id_beca_soli')->references('id_beca_soli')->on('beca_soli')->onDelete('cascade');
            $table->foreignId('id_beca_pregunta')->references('id_beca_pregunta')->on('beca_pregunta')->onDelete('cascade');
            $table->text('respuesta_beca');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beca_respuesta');
    }
};
