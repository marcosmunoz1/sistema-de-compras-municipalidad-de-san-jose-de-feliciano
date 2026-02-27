<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facturas_compra', function (Blueprint $table) {
            $table->id();

            $table->foreignId('compra_id')
                  ->constrained('compras')
                  ->onDelete('cascade');

            $table->string('archivo'); // ruta del pdf o imagen

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facturas_compra');
    }
};