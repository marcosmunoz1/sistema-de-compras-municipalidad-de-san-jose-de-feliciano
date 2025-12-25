<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabla de áreas
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('prefijo_catalogacion', 3)->unique();
            $table->timestamps();
        });

        // Tabla de equipos
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('equipamiento');
            $table->string('marca');
            $table->text('descripcion')->nullable();
            $table->foreignId('area_id')->constrained('areas')->onDelete('restrict');
            $table->string('catalogacion')->unique();
            $table->boolean('estado')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });

        /* Insertar las 4 áreas predefinidas
        DB::table('areas')->insert([
            [
                'nombre' => 'Secretaría de Gobierno',
                'prefijo_catalogacion' => 'SG-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Secretaría de Obras Públicas',
                'prefijo_catalogacion' => 'OP-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Secretaría de Desarrollo Humano',
                'prefijo_catalogacion' => 'DH-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Servicios Públicos',
                'prefijo_catalogacion' => 'SP-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);*/

    }
    public function down(): void
    {
        Schema::dropIfExists('equipos');
        Schema::dropIfExists('areas');
    }
};