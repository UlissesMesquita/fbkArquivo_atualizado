<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caixa_Departamento extends Model
{
    
    //Model referente a tabela cadastro Caixa Departamento
    protected $primaryKey = 'caixa';
    public $incrementing = true;
    public $table = 'caixa__departamentos';
    public $timestamps = false;


    public function departamentos() {
        return $this->hasMany('App\Departamentos', 'id_caixa_departamento'); 
    }
}