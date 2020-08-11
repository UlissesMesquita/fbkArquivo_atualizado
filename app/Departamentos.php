<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Departamentos extends Model
{
        //Model referente a tabela cadastro departamentos
        protected $primaryKey = 'id_departamento';
        public $incrementing = true;
        public $table = 'departamentos';

public function caixa_departamento() {
        return $this->belongsTo(caixa_departamento::class); 
    }
}