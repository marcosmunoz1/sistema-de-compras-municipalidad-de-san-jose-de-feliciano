<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('obra_producto', function (Blueprint $table) {
            $table->foreignId('detalle_compra_id')
                  ->nullable()
                  ->constrained('detalle_compras')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('obra_producto', function (Blueprint $table) {
            $table->dropForeign(['detalle_compra_id']);
            $table->dropColumn('detalle_compra_id');
        });
    }
};

