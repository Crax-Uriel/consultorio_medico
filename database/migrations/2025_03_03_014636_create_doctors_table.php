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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_doctor',40);
            $table->string('apellido_paterno_doctor',60);
            $table->string('apellido_materno_doctor',60);
            $table->string('curp',20)->unique();
            $table->string('celular',15)->nullable();
            $table->string('licencia_medica',30)->unique();
            $table->string('especialidad',50);

            // id de llave foranea 
            $table->unsignedBigInteger('user_id');
            //realcionando a la tabla usuarios 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
