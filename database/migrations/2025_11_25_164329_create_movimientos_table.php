<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();

            // Producto relacionado
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')
                  ->references('id')->on('productos')
                  ->onDelete('cascade');

            // Si viene de una compra
            $table->unsignedBigInteger('compra_id')->nullable();
            $table->foreign('compra_id')
                  ->references('id')->on('compras')
                  ->nullOnDelete();

            // Tipo de movimiento
            $table->string('tipo');  // entrada, salida, transferencia

            // ORIGEN polimórfico
            $table->string('origen_tipo')->nullable(); // proveedor, deposito, obra, vehiculo
            $table->unsignedBigInteger('origen_id')->nullable();

            // DESTINO polimórfico
            $table->string('destino_tipo'); // deposito, obra, vehiculo
            $table->unsignedBigInteger('destino_id');

            // Cantidad movida
            $table->decimal('cantidad', 12, 2);

            // Fecha del movimiento
            $table->date('fecha');

            // Observación
            $table->text('observacion')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
