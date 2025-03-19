<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('gerente_id');
            $table->unsignedBigInteger('condicion_id');
            $table->unsignedBigInteger('distrito_id');
            $table->unsignedBigInteger('sede_id');
            $table->unsignedBigInteger('provincia_id');
            $table->timestamps();

          
            $table->foreign('gerente_id')->references('id')->on('gerentes')->onDelete('cascade');
            $table->foreign('condicion_id')->references('id')->on('condiciones')->onDelete('cascade');
            $table->foreign('distrito_id')->references('id')->on('distritos')->onDelete('cascade');
            $table->foreign('sede_id')->references('id')->on('sedes')->onDelete('cascade');
            $table->foreign('provincia_id')->references('id')->on('provincias')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hospitals');
    }
}
