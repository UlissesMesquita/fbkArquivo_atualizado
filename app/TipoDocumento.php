<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $primaryKey = 'id_tp_documento';
    public $incrementing = true;
    public $table = 'tp_documento';
    public $timestamps = false;
}
