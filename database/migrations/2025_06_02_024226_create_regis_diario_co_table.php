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
        Schema::create('regis_diario_co', function (Blueprint $table) {
            $table->id('id_regis_diario_co');
            $table->foreignId('id_horario_co')
                ->constrained('horario_co', 'id_horario_co')
                ->onDelete('cascade');
            $table->foreignId('id_persona')
                ->constrained('persona', 'id_persona')
                ->onDelete('cascade');
            $table->date('fecha_regis_diario_co');
            $table->time('hora')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regis_diario_co');
    }
};
