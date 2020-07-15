<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro_Documentos extends Model
{

    //Model referente a tabela cadastro documentos
    protected $primaryKey = 'id_codigo';
    public $incrementing = true;
    public $table = 'cadastro__documentos';
    
}
