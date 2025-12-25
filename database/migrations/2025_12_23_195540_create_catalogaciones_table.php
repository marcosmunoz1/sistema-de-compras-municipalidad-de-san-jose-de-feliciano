<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('catalogaciones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique(); // SG-001, OP-002, etc.
            $table->foreignId('area_id')->constrained('areas')->onDelete('restrict');
            $table->string('tipo'); // 'equipo' o 'vehiculo'
            $table->unsignedBigInteger('item_id'); // ID del equipo o vehículo
            $table->timestamps();
            
            // Índice compuesto para buscar rápido
            $table->index(['tipo', 'item_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catalogaciones');
    }
};
