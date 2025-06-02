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
        Schema::create('jornada_beca', function (Blueprint $table) {
            $table->id('id_jornada_beca');
            $table->string('nombre_jornada_beca');
            $table->string('descripcion_jornada_beca')->nullable();
            $table->foreignId('id_be_servicio')
                ->constrained('be_servicio', 'id_be_servicio')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jorornada_beca');
    }
};
