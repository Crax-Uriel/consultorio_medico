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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto',10,2);
            $table->date('fecha_pago');
            $table->string('descripcion',200);

            // id de llave foranea 
            $table->unsignedBigInteger('paciente_id');
            //realcionando a la tabla usuarios 
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');

             // id de llave foranea 
            $table->unsignedBigInteger('doctor_id');
             //realcionando a la tabla usuarios 
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
