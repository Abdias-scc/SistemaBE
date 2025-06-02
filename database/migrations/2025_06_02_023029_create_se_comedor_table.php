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
        Schema::create('servicio_co', function (Blueprint $table) {
            $table->id('id_servicio_co');
            $table->string('tipo_servicio_co');
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
        Schema::dropIfExists('se_comedor');
    }
};
