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
        Schema::create('compras', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('proveedor_id')->constrained('proveedores')->cascadeOnDelete(); 
            $table->foreignId('empleado_id')->constrained('empleados')->cascadeOnDelete(); 
            $table->string('nr_orden')->unique();
            $table->date('fecha_orden');
            $table->string('estado_compra'); 
            $table->decimal('total', 15, 2);  
            $table->boolean('estado')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
