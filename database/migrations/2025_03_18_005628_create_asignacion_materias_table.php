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
        Schema::create('asignacion_materias', function (Blueprint $table) {
            $table->id();

            $table->foreignId('matriculacion_id')->constrained('matriculacions')->onDelete('cascade');
            $table->foreignId('grupo_academico_id')->constrained('grupos_academicos')->onDelete('cascade');
            
            $table->enum('estado',['activo','inactivo','aprobo','reprobo']);
            $table->decimal('nota_final',5,2)->nullable();
            $table->date('fecha_asignacion');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignacion_materias');
    }
};
