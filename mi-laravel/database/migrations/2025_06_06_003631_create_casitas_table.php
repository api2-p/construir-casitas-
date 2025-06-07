<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('casitas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');     // Campo para el nombre de la casita
        $table->string('tamaño');     // Campo para el tamaño de la casita
        $table->timestamps();         // created_at y updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casitas');
    }
};
