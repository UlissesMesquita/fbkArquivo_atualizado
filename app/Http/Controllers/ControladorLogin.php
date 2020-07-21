<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;

class ControladorLogin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //Envia novo usuário para tela de login
       return view('login/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Consultando os Valores do envio $Request
        $log = new Login();
        $log->login = $request->input('login');
        $log->password = $request->input('password');

        //Consultando no Banco de Dados por usuário;
        $consulta = Login::all();


  

foreach($consulta as $dados) {

        if ($dados['login'] == $log->login) {
            //Verificar Password se está correto.
            if($dados['password'] == $log->password) {
                //Criar Sessão
                    session_start();
                //Atribuir ID Sessão.
                    $_SESSION = [$dados['id_usuario']];
                //Autentica usuário
                    Login::where('id_usuario', $dados['id_usuario'])->update(['autenticado' => 1]);
                //Envia usuário autenticado para pagina Dashboard.
                    return redirect(route('dashboard'));    
            }
            else{
                //Caso esteja errado a senha, informa o erro
                //Senha errada, envia usuário com senha errada para pagina Dashboard
                echo "Senha Errado";    
                //return redirect(route('index'));
            }
        }
        else {
            //Usuario errado, envia usuário com login errado para pagina login.
            echo "Usuário Errado";   
            //return redirect(route('index'));
        }
}

     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Adiciona Usuário no banco de dados já com o MD5
        $log = new Login();
        $log->login = $request->input('login');
        $log->password = md5($request->input('password'));
        $log->save();

        //Mostra usuários Cadastrados na Tela de Cadastro
        $users = Login::all();
        return view('login/usuarios', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //Mostra usuários na tela de Cadastro
        $users = Login::all();
        return view('login/usuarios', compact('users'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit($id_usuario)
    {
        
        $edit = Login::find($id_usuario);
        return view('login/usuarios_update', compact('edit'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_usuario)
    {
        //Recupera Valores
        $log = new Login();
        $log->login = $request->input('login');
        $log->password = $request->input('password');

        //Altera Valores usuários Banco de Dados
        Login::where('id_usuario', $id_usuario)->update(['login' => $log->login]);
        Login::where('id_usuario', $id_usuario)->update(['password' => md5($log->password)]);

        return redirect(route('configuracoes-usuarios'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_usuario)
    {

        //session_destroy($id_usuario);
        $log = Login::find($id_usuario);
        $log->delete();

        return redirect(route('configuracoes-usuarios'));
    }
}
