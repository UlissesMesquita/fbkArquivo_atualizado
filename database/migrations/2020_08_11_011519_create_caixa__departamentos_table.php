<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaixaDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caixa__departamentos', function (Blueprint $table) {
            $table->bigIncrements('id_caixa');

            $table->bigInteger('id_caixa_departamento')->unsigned();
            $table->foreign('id_caixa_departamento')->references('id_departamento')->on('departamentos')->onDelete('cascade');

            //$table->string('departamento_caixa');
            $table->string('status')->default('Aberta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caixa__departamentos');
    }
}
