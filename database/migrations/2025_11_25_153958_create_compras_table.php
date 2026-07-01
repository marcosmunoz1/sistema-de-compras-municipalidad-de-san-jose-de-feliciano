<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     
    public function up(): void
    {

        Schema::create('compras', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('proveedor_id')->constrained('proveedores')->cascadeOnDelete(); //listo
            $table->foreignId('empleado_id')->constrained('empleados')->cascadeOnDelete(); //listo
            $table->string('destino_tipo', 50); //listo
            $table->unsignedBigInteger('destino_id')->nullable(); //listo   
            $table->string('area_solicitante'); // compras en el metodo store listo 
            $table->string('nr_orden')->unique(); //manejarla en el controlador 
            $table->date('fecha_orden'); //listo 
            $table->string('estado_compra'); //listo controlador 
            $table->string('asunto_obra_automotor');  // Cuando la compra no tiene destino definido aún, Se compran materiales “para stock” 
            $table->decimal('total', 15, 2)->nullable(); //nullable en el store //listo 
            $table->string('observacion')->nullable(); // listo 
            $table->boolean('estado')->default(true); // listo store 
            $table->softDeletes(); // listo  
            $table->timestamps(); //listo  

            // Polimorfismo manual 
            $table->index(['destino_tipo', 'destino_id']); // no esta hecha esta modificacion en la base de datos
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
