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
        Schema::create('equipo_producto', function (Blueprint $table) {
            $table->id();

            $table->foreignId('producto_id')
                ->constrained('productos')
                ->onDelete('cascade');

            $table->foreignId('equipo_id')
                ->constrained('equipos')
                ->onDelete('cascade');

            $table->foreignId('detalle_compra_id')
                  ->nullable()
                  ->constrained('detalle_compras')
                  ->cascadeOnDelete();
                  
            $table->decimal('cantidad_asignada', 10, 2);
            $table->decimal('stock', 10, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_vehiculo');
    }
};
