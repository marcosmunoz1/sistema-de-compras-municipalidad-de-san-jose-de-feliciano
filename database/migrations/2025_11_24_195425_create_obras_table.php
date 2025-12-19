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
        Schema::create('obras', function (Blueprint $table) {
            $table->id();

            // Datos básicos
            $table->string('nombre');
            $table->text('descripcion')->nullable();

            // Ubicación física
            $table->string('direccion')->nullable();   // Calle y altura
            $table->string('barrio')->nullable();
            $table->string('ciudad')->nullable()->default('San José de Feliciano'); // opcional

            // Responsable del área
            $table->string('responsable')->nullable();
            $table->string('resolucion_decreto')->nullable();
            $table->string('ejecutado_por');
            // Fechas importantes
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_estimada_fin')->nullable();
            $table->date('fecha_fin')->nullable();

            // Estado de la obra
            $table->enum('estado_obra', [
                'planificada',
                'en_ejecucion',
                'demorada',
                'finalizada',
                'cancelada'
            ])->default('planificada');

            // Notas o aclaraciones
            $table->text('observaciones')->nullable();

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
        Schema::dropIfExists('obras');
    }
};
