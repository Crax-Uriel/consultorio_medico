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
        Schema::create('secretarias', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',100);
            $table->string('apellido_paterno',100);
            $table->string('apellido_materno',100);
            $table->string('curp',20)->unique();
            $table->string('celular',15);
            $table->date('fecha_nacimiento',100);
            $table->string('direccion',255);
            $table->string('sexo',2);
            $table->string('status',15);
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
        Schema::dropIfExists('secretarias');
    }
};
