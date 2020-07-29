<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadastroDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastro__documentos', function (Blueprint $table) {
            $table->timestamps();
            $table->bigIncrements('id_codigo');


            $table->string('data');
            $table->string('Assunto');
            $table->string('Emp_Emit');
            $table->string('Emp_Dest');
            $table->string('Formato_Doc');
            $table->string('Nome_Doc');
            $table->string('Valor_Doc')->nullable();
            $table->string('Dt_Ref');
            $table->string('tp_documento');
            $table->string('Tp_Projeto');
            $table->string('jobs')->nullable();
            $table->string('Palavra_Chave');
            $table->string('Desc');
            $table->string('Dep');
            $table->string('Origem');
            $table->string('Loc_Cor');
            $table->string('Loc_Est');
            $table->string('Loc_Box_Eti');
            $table->string('Desfaz');
            $table->string('Loc_Maco');
            $table->string('Loc_Status');
            $table->string('Loc_Arquivo');
            $table->string('Loc_Obs')->nullble();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas__documentos');
    }
}
