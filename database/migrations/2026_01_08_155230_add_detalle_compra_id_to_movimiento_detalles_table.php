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
        Schema::table('movimiento_detalles', function (Blueprint $table) {
            $table->unsignedBigInteger('detalle_compra_id')->nullable()->after('producto_id');
            
            // Si tienes la tabla detalle_compras y quieres foreign key
            $table->foreign('detalle_compra_id')
                  ->references('id')
                  ->on('detalle_compras')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movimiento_detalles', function (Blueprint $table) {
            $table->dropForeign(['detalle_compra_id']);
            $table->dropColumn('detalle_compra_id');
        });
    }
};