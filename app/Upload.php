<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{

    protected $primaryKey = 'id_upload';
    public $table = 'uploads';

   protected $fillble = [
       'id_codigo',
       'id_upload_codigo',
       'path'
   ];

   public function cadastro_documento() {
        return $this->belongsTo(Cadastro_Documentos::class); 
    }
}
