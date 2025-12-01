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
        Schema::table('combustibles', function (Blueprint $table) {
            $table->string('sub_cuenta')->after('tipo');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('combustibles', function (Blueprint $table) {
            $table->dropColumn('sub_cuenta')->after('tipo');   
        });
    }
};
