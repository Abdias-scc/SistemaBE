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
        Schema::create('beca_pregunta', function (Blueprint $table) {
            $table->id('id_beca_pregunta');
            $table->text('pregunta_beca');
            $table->foreignId('id_beca_soli')->references('id_beca_soli')->on('beca_soli')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beca_pregunta');
    }
};
