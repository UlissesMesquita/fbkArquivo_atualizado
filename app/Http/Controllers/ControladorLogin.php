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

        session()->put('autenticado', 0);
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
        //Verifica se o login digitado está correto
        //dd($dados);     
        while ($dados['login'] == $log->login && $dados['ativo'] == 'Ativo') {
            //Verificar Password se está correto.
            if($dados['password'] == md5($log->password)) {
                //Atribuir Permissão da  Sessão.
                    session()->put('permissao', $dados['permissao']);
                    session()->put('id_usuario', $dados['id_usuario']);
                //Autentica usuário
                    Login::where('id_usuario', $dados['id_usuario'])->update(['autenticado' => 1]);
                    session()->put('autenticado', $dados['autenticado']);
                //Envia usuário autenticado para pagina Dashboard.
                    return redirect(route('dashboard'));    
            }
            else{
                //Caso esteja errado a senha, informa o erro
                //Senha errada, envia usuário com senha errada para pagina Dashboard
                    return redirect(route('index'));
            }
        }

        $erro = ['Erro' => 'Usuário incorreto <br>', 'Erro' => 'Usuário Desativado'];
        //return redirect(route('index'));

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
        $log->permissao = $request->input('permissao');
        $log->ativo = $request->input('ativo');
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
        $log->permissao = $request->input('permissao');
        $log->ativo = $request->input('ativo');

        //Altera Valores usuários Banco de Dados
        Login::where('id_usuario', $id_usuario)->update(['login' => $log->login]);
        Login::where('id_usuario', $id_usuario)->update(['password' => md5($log->password)]);
        Login::where('id_usuario', $id_usuario)->update(['permissao' => $log->permissao]);
        Login::where('id_usuario', $id_usuario)->update(['ativo' => $log->ativo]);

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

    public function leave($id_usuario)
    {
        session()->put('autenticado', 'null');
        $log = Login::find($id_usuario);
        Login::where('id_usuario', $id_usuario)->update(['autenticado' => 0]);

        return redirect(route('index'));

    }
}
