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
        Schema::create('obra_producto', function (Blueprint $table) {
            $table->id();

            // Obra relacionada
            $table->unsignedBigInteger('obra_id');
            $table->foreign('obra_id')
                  ->references('id')->on('obras')
                  ->onDelete('cascade');
            // Producto relacionado
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')
                  ->references('id')->on('productos')
                  ->onDelete('cascade');
            $table->decimal('cantidad_asignada', 10,2);

           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obra_producto');
    }
};
