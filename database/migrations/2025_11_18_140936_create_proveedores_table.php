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
        Schema::create('proveedores', function (Blueprint $table) { 
            $table->id();
            $table->string('localidad');
            $table->string('provincia');
            $table->string('pais'); 
            $table->string('empresa');
            $table->string('nombre'); 
            $table->string('razon_social')->nullable();
            $table->string('cuit')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->required();
            $table->string('email')->nullable();   
            $table->string('codigo_postal')->nullable();
            $table->string('direccion')->nullable();
            $table->string('observaciones')->nullable(); 
            $table->timestamps(); 
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
