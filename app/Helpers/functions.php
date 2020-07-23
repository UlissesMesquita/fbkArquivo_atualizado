namespace App

//Função autentica login Admin
public function validaLoginAdmin(session->get('autenticado'), session->get('permissao')) {
        $sessao = session->get('autenticado');
        $permissao = session->get('permissao');

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
public function validaLogin(session->get('autenticado')) {
        $sessao = session->get('autenticado');
            if($sessao != '1') {
              redirect(route('index'));
            }
            else {
              //Permite acesso
            }
    }
