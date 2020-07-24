<?php

namespace App\Helpers;

class Helper
{

  //Função autentica login Admin
function validaLoginAdmin($permissao, $sessao ) {
        if($sessao != '1') {
          redirect(route('index'));
        }
        elseif($permissao != 'admin') {
          redirect(route('dashboard'));
        }
        else {
          //Permite acesso
        }
  }


  //Função autentica login
function validaLogin($sessao) {
        if($sessao != '1') {
          redirect(route('index'));
        }
        else {
          //Permite acesso
        }
  }

}




