<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('combustibles', function (Blueprint $table) {
            $table->string('estado_carga')->after('imagen_factura');
        });
    }

    public function down(): void
    {
        Schema::table('combustibles', function (Blueprint $table) {
            $table->dropColumn('estado_carga');
        });
    }
};
