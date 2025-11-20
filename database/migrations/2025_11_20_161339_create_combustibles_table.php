<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /*  
    public function up(): void
    {
        Schema::create('combustibles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->cascadeOnDelete();
            $table->foreignId('empleado_id')->constrained('empleados')->cascadeOnDelete();
            $table->string('codigo'); // nr de factura  
            $table->decimal('litros', 8, 2); //Litros consumidos
            $table->string('tipo'); //Tipo de combustible (Ej.: Gasolina, Diesel, Etanol)
            $table->decimal('precio', 8, 2); //Precio por litro 
            $table->string('estacion'); //Estación de combustible
            $table->date('fecha');

            $table->boolean('estado')->default(true); //Estado (Ej.: Activo, Inactivo) 
            $table->softDeletes();
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('combustibles');
    }   */
}; 