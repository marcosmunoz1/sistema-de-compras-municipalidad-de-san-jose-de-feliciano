<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('combustibles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->cascadeOnDelete();
            $table->foreignId('empleado_id')->constrained('empleados')->cascadeOnDelete(); 
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); //Usuario que registro el combustible 
            $table->string('codigo'); // nr de factura  
            $table->decimal('litros', 12, 2)->nullable(); //Litros consumidos 
            $table->string('tipo'); //Tipo de combustible (Ej.: Gasolina, Diesel, Etanol)
            $table->decimal('precio', 12, 2)->nullable(); //Precio por litro 
            $table->string('estacion'); //Estación de combustible
            $table->date('fecha');
            $table->decimal('monto', 12, 2)->nullable(); //Total del combustible / importe 
            $table->string('tipo_de_pago'); //Tipo de pago (Ej.: Efectivo, Tarjeta, Transferencia)  
            $table->string('observaciones')->nullable(); //Observaciones
            $table->string('imagen_factura')->nullable(); //Imagen de la factura  

            $table->boolean('estado')->default(true); //Estado (Ej.: Activo, Inactivo) 
            $table->softDeletes();
            $table->timestamps();
        });
    } 

   
    public function down(): void
    {
        Schema::dropIfExists('combustibles');
    }  
};  