<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ControladorSessao extends Controller
{
    public function session(){
        echo "teste sessão";


        session()->put('permissao', 'Admin');

        
        var_dump(session::all());
    }
}
