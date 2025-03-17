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
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('title',255);
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('color');


             // id de llave foranea 
            $table->unsignedBigInteger('user_id');
             //realcionando a la tabla usuarios 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
             // id de llave foranea 
            $table->unsignedBigInteger('doctor_id');
             //realcionando a la tabla usuarios 
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('no action');

             // id de llave foranea 
            $table->unsignedBigInteger('consultorio_id');
             //realcionando a la tabla usuarios 
            $table->foreign('consultorio_id')->references('id')->on('consultorios')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
