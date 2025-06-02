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
        Schema::create('usuario_permiso', function (Blueprint $table) {
            $table->id('id_usuario_permiso');
            $table->foreignId('id_usuario')->references('id_usuario')->on('users')->onDelete('cascade');
            $table->foreignId('id_permiso')->references('id_permiso')->on('permiso')->onDelete('cascade');
            $table->timestamps();
            });
            
            
    }
    public function down(): void
    {
        
    }

};