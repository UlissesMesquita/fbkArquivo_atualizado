<?php

namespace App\Http\Controllers;

use App\Departamentos;
use App\Empresas_Destinatarias;
use App\Empresas_Emitentes;
use App\Origens;
use Illuminate\Http\Request;
use App\Cadastro_Documentos;
use Illuminate\Http\Response;


class ControladorDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

  
       $dash = Cadastro_Documentos::all()->sortByDesc('id_codigo');
       $documentos = Cadastro_Documentos::all();


       return view('forms_create/dashboard', compact('dash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  

        $emit  = Empresas_Emitentes::all();
        $dest = Empresas_Destinatarias::all();
        $ori = Origens::all();
        $dep = Departamentos::all();
        $edit = Cadastro_Documentos::find($id);
        
        return view('forms_edit/documentos_update', compact('emit', 'dest', 'ori', 'dep', 'edit'));

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

        $doc = new Cadastro_Documentos();

        $doc->data = $request->input('data');
        $doc->Assunto = $request->input('Assunto');
        $doc->Emp_Emit = $request->input('Emp_Emit');
        $doc->Emp_Dest = $request->input('Emp_Dest');
        $doc->Tp_Doc = $request->input('Tp_Doc');
        $doc->Tp_Projeto = $request->input('Tp_Projeto');
        $doc->Nome_Doc = $request->input('Nome_Doc');
        $doc->Valor_Doc = $request->input('Valor_Doc');
        $doc->Dt_Ref = $request->input('Dt_Ref');
        $doc->Tit_Doc = $request->input('Tit_Doc');
        $doc->Palavra_Chave = $request->input('Palavra_Chave');
        $doc->Desc = $request->input('Desc');
        $doc->Dep = $request->input('Dep');
        $doc->Origem = $request->input('Origem');
        $doc->Loc_Cor = $request->input('Loc_Cor');
        $doc->Loc_Est = $request->input('Loc_Est');
        $doc->Loc_Box_Eti = $request->input('Loc_Box_Eti');
        $doc->Loc_Maco = $request->input('Loc_Maco');
        $doc->Loc_Status = $request->input('Loc_Status');
        $doc->Loc_Obs = $request->input('Loc_Obs');
        $doc->Desfaz = $request->input('Desfaz');
        


        Cadastro_Documentos::where('id_codigo', $id)->update([
            'data' => $doc->data,
            'Assunto' => $doc->Assunto,
            'Emp_Emit' => $doc->Emp_Emit,
            'Emp_Dest' => $doc->Emp_Dest,
            'Tp_Doc' => $doc->Tp_Doc,
            'Tp_Projeto' => $doc->Tp_Projeto,
            'Nome_Doc' => $doc->Nome_Doc,
            'Valor_Doc' => $doc->Valor_Doc,
            'Dt_Ref' => $doc->Dt_Ref,
            'Tit_Doc' => $doc->Tit_Doc,
            'Palavra_Chave' => $doc->Palavra_Chave,
            'Desc' => $doc->Desc,
            'Dep' => $doc->Dep,
            'Origem' => $doc->Origem,
            'Loc_Cor' => $doc->Loc_Cor,
            'Loc_Est' => $doc->Loc_Est,
            'Loc_Box_Eti' => $doc->Loc_Box_Eti,
            'Loc_Maco' => $doc->Loc_Maco,
            'Loc_Status' => $doc->Loc_Status,
            'Loc_Obs' => $doc->Loc_Obs,
            'Desfaz' => $doc->Desfaz
            
            ]);

            return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function destroy($id)
    {
        
        $document = Cadastro_Documentos::find($id);
        $document->Delete();
        return redirect(route('dashboard'));
    }
}
