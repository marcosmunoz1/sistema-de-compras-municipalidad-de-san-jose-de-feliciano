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

            ;

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
            $table->string('destino_tipo')->nullable(); // deposito, obra, vehiculo
            $table->unsignedBigInteger('destino_id')->nullable();


            // Fecha del movimiento
            $table->date('fecha');

            // Observación
            $table->text('observacion')->nullable();
             

            $table->boolean('estado')->default(true);   
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
