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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_paciente',40);
            $table->string('apellido_paterno_paciente',80);
            $table->string('apellido_materno_paciente',80);
            $table->string('curp_paciente',19)->unique();
            $table->string('nss',20)->unique();
            $table->string('correo_paciente')->unique();
            $table->string('celular_paciente',15);
            $table->date('fecha_nacimiento_paciente');
            $table->string('direccion_paciente',255);
            $table->string('sexo_paciente',2);
            $table->string('tipo_sangre',10);
            $table->string('alergias',200);
            $table->float('peso')->nullable();
            $table->float('altura')->nullable();
            $table->string('contacto_emergencia',13);
            $table->string('observaciones',250)->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
