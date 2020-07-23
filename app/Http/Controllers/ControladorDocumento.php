<?php

namespace App\Http\Controllers;

use App\Departamentos;
use App\Empresas_Destinatarias;
use App\Empresas_Emitentes;
use App\Origens;
use Illuminate\Http\Request;
use App\Cadastro_Documentos;
use Illuminate\Http\Response;

class ControladorDocumento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $documentos = Cadastro_Documentos::all()->sortByDesc('id_codigo')->last();

        return view('forms_create/dashboard', compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $emit = Empresas_Emitentes::get();
        $dest = Empresas_Destinatarias::get();
        $ori = Origens::get();
        $dep = Departamentos::get();
        
        $documentos = Cadastro_Documentos::all();
        $dash = Cadastro_Documentos::all()->sortByDesc('id_codigo')->take(1);

       
        return view('forms_create/documentos', compact('emit', 'dest', 'ori', 'dep', 'documentos', 'dash'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
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
        $doc->Desfaz = $request->input('Desfaz');
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
        $doc->save();

        for($i = 1; $i < count($request->allFiles()['anexo']); $i++) {
           
            $file = $request->allFiles()['anexo'][$i];

            $doc->path = $file->store('anexos');
            $doc->save();
            unset($fileUpload);

        }













/*
        
        //Obtenção da extensão do arquivo.
        $extension_pdf = $request->pdf->extension();
        
        //Nome do documento pdf.
        $name_file = $doc->id_codigo.'_'.$doc->Tit_Doc. '.' .$extension_pdf;
       
        //Define local de armazenamento do documento
        $upload = $request->file('pdf')->storeAs('pdfs', $name_file);


        if(!$upload) {
            echo "<div class='alert-danger' align='center'> Erro ao realizar Upload</div> ";
        }
        
        else {

            echo "<div class='alert-success' align='center'> Documento cadastrado com sucesso</div> ";
            return redirect('documento');
        }
        
        
       
*/



       }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
