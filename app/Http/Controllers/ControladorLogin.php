<?php

namespace App\Http\Controllers;

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
        
/*
        //Cria usuario e senha do novo usuário
        $login = $log->login = $request->input('login');
        $password = $log->password = $request->input('password');
        $doc->save();
        return redirect('configuracoes-usuarios');
*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Autentica usuário 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        return view('login/usuarios');
/*
        //Verifica usuario autenticado
        $log = new Login();

        $login = $log->login = $request->input('login');
        $password = $log->password = $request->input('password');

*/



    //Busca dados do banco
        $auth = Login::all();


    if ($login == $auth->login){
        
        if($password == md5($auth->password)){
            session_start();
            $_SESSION[$auth->id_usuario]; 
            return view('dashboard');
        }
        else {

            aleta:"senha errada";
            return view('login/login');
        }
    }
    else {
        alerta:"usuario errado";
    }
     
    



    }

        

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_usuario)
    {

        session_destroy($id_usuario);
        return view('login/login');

        //Sair
        //Destroi sessão
        //Envia usuário para pagina de login
    }
}
