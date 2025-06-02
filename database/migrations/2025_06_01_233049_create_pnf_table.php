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
        Schema::create('pnf', function (Blueprint $table) {
            $table->id('id_pnf');
            $table->string('nombre_pnf');
            $table->foreignId('id_estatus')->nullable()->constrained('estatus', 'id_estatus')->onDelete('cascade');
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