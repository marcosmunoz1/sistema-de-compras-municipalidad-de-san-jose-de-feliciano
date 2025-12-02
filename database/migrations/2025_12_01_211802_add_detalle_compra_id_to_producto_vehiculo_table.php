<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('producto_vehiculo', function (Blueprint $table) {
            $table->unsignedBigInteger('detalle_compra_id')->nullable()->after('producto_id');

            // si querés integridad referencial
            $table->foreign('detalle_compra_id')
                ->references('id')
                ->on('detalle_compras')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('producto_vehiculo', function (Blueprint $table) {
            $table->dropForeign(['detalle_compra_id']);
            $table->dropColumn('detalle_compra_id');
        });
    }
};
