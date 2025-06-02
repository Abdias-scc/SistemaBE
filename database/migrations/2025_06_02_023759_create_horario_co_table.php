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
        Schema::create('horario_co', function (Blueprint $table) {
            $table->id('id_horario_co');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->foreignId('id_servicio_co')
                ->constrained('servicio_co', 'id_servicio_co')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario_co');
    }
};
