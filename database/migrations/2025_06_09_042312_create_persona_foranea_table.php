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
        Schema::create('persona_foranea', function (Blueprint $table) {
            $table->unsignedBigInteger('id_persona')->primary();
            $table->foreign('id_persona')->references('id_persona')->on('persona')->onDelete('cascade');
            $table->string('residencia');
            $table->float('costo_residencia');
            $table->string('direccion_tem');
            $table->string('viaje_diario');
            $table->integer('dias_viaje');
            $table->float('costo_diario_viaje');
            $table->string('tiempo_viaje');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona_foranea');
    }
};
