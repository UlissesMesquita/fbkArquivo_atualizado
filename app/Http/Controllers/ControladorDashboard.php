<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Departamentos;
use App\Empresas_Destinatarias;
use App\Empresas_Emitentes;
use App\Origens;
use App\TipoDocumento;
use App\Job;
use App\Cadastro_Documentos;



class ControladorDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(session()->get('autenticado') == 1) {
            $dash = Cadastro_Documentos::all()->sortByDesc('id_codigo');
            $documentos = Cadastro_Documentos::all();
            return view('forms_create/dashboard', compact('dash'));
        }
        else {
            return redirect(route('index'));
        }
  
      
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

        if(session()->get('autenticado') == 1) {
            $emit  = Empresas_Emitentes::orderBy('cad_emitentes', 'ASC')->get();
            $dest = Empresas_Destinatarias::orderBy('cad_destinatarias', 'ASC')->get();
            $ori = Origens::orderBy('cad_origem', 'ASC')->get();
            $dep = Departamentos::orderBy('cad_departamento', 'ASC')->get();
            $edit = Cadastro_Documentos::find($id);
            $tp_documento = TipoDocumento::orderBy('tp_documento', 'ASC')->get();
            $job = Job::orderBy('nome_job', 'ASC')->get();
            
            return view('forms_edit/documentos_update', compact('emit', 'dest', 'ori', 'dep', 'edit', 'tp_documento', 'job'));
        }
        else {
            return redirect(route('index'));
        }
        

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
        if(session()->get('autenticado') == 1) {
            $doc = new Cadastro_Documentos();

            //$doc->data = $request->input('data');
            $doc->Assunto = $request->input('Assunto');
            $doc->Emp_Emit = $request->input('Emp_Emit');
            $doc->Emp_Dest = $request->input('Emp_Dest');
            $doc->Formato_Doc = $request->input('Formato_Doc');
            $doc->Tp_Projeto = $request->input('Tp_Projeto');
            $doc->nome_job = $request->input('nome_job');
            $doc->Nome_Doc = $request->input('Nome_Doc');
            $doc->Valor_Doc = $request->input('Valor_Doc');
            $doc->Loc_Arquivo = $request->input('Loc_Arquivo');
            $doc->Dt_Ref = $request->input('Dt_Ref');
            $doc->tp_documento = $request->input('tp_documento');
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

            $doc->editado_por = $request->input('editado_por');
            


            Cadastro_Documentos::where('id_codigo', $id)->update([
                //'data' => $doc->data,
                'Assunto' => $doc->Assunto,
                'Emp_Emit' => $doc->Emp_Emit,
                'Emp_Dest' => $doc->Emp_Dest,
                'Formato_Doc' => $doc->Formato_Doc,
                'Tp_Projeto' => $doc->Tp_Projeto,
                'nome_job' => $doc->nome_job,
                'Loc_Arquivo' => $doc->Loc_Arquivo,
                'Nome_Doc' => $doc->Nome_Doc,
                'Valor_Doc' => $doc->Valor_Doc,
                'Dt_Ref' => $doc->Dt_Ref,
                'tp_documento' => $doc->tp_documento,
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
                'Desfaz' => $doc->Desfaz,
                'editado_por' => $doc->editado_por,
                
                ]);

                return redirect(route('dashboard'));
        }
        else {
            return redirect(route('index'));
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function destroy($id)
    {
        if(session()->get('autenticado') == 1) {
            $document = Cadastro_Documentos::find($id);
            $document->Delete();
            return redirect(route('dashboard'));
        }
        else {
            return redirect(route('index'));
        }
        
    }


    public function manual () {
        if(session()->get('autenticado') == 1) {

            return redirect(url("storage/Manual_Sistema_SisFBK.pdf"));
            
        }
        else{
            return redirect(route('index'));
        }
    }




}
