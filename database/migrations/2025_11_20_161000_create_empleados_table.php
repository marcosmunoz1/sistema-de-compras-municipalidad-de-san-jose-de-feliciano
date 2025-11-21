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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre');
            $table->string('dni')->unique(); //DNI  
            $table->string('celular')->nullable();
            $table->string('direccion')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('puesto')->nullable(); //Cargo (Ej.: Mecánico, Chofer, Administrativo) 
            $table->string('area')->nullable(); //Área o departamento (Ej.: Taller, Logística, Compras) 
            $table->text('observaciones')->nullable(); //Observaciones 
            $table->boolean('estado')->default(true); //Estado (Ej.: Activo, Inactivo) 
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
