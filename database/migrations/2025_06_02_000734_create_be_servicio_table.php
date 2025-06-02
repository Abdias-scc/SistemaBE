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
        Schema::create('be_servicio', function (Blueprint $table) {
            $table->id('id_be_servicio');
            $table->string('nombre_be_servicio');
            $table->foreignId('id_estatus')->references('id_estatus')->on('estatus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
        
};
