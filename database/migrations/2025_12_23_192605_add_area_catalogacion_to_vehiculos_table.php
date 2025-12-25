<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vehiculos', function (Blueprint $table) {
            // Agregar relación con área
            $table->foreignId('area_id')->nullable()->after('id')->constrained('areas')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::table('vehiculos', function (Blueprint $table) {
            // Eliminar la foreign key primero
            $table->dropForeign(['area_id']);
            
        });
    }
};