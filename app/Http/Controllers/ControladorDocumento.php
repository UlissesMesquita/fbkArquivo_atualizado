<?php

namespace App\Http\Controllers;

use App\Cadastro_Documentos;
use App\Departamentos;
use App\Empresas_Destinatarias;
use App\Empresas_Emitentes;
use App\Origens;
use App\Upload;
use App\TipoDocumento;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use http\Header;

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
        $tp_documentos = TipoDocumento::get();
        $job = Job::get();
        
        $documentos = Cadastro_Documentos::all();
        $dash = Cadastro_Documentos::all()->sortByDesc('id_codigo')->take(1);

       
        return view('forms_create/documentos', compact('emit', 'dest', 'ori', 'dep', 'documentos', 'dash', 'tp_documentos', 'job'));

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
        $doc->Formato_Doc = $request->input('Formato_Doc');
        $doc->Tp_Projeto = $request->input('Tp_Projeto');
        $doc->Nome_Doc = $request->input('Nome_Doc');
        $doc->Valor_Doc = $request->input('Valor_Doc');
        $doc->Dt_Ref = $request->input('Dt_Ref');
        $doc->Desfaz = $request->input('Desfaz');
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
        $doc->save();
        $doc->refresh();

        
        //Multiplos Uploads
        foreach($request->allFiles()['anexo'] as $file) {
            //dd($file->getClientOriginalName());

            $fileUpload = new Upload();
            $fileUpload->id_upload_codigo = $doc->id_codigo;

            try {
                $fileUpload->path = $file->getClientOriginalName();
                $file->storeAs('anexos/'.$fileUpload->id_upload_codigo.'/', $file->getClientOriginalName());
                //dd($file->store('anexos'));
                //dd($fileUpload);
                $fileUpload->save();
                unset($fileUpload);

            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['erro' => 'Erro:'. $e->getMessage() ]);
            }
            
            

        }


        return redirect(route('dashboard'));


       }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request)
    {
        $files = Upload::where('id_upload_codigo', '=', $request->input('id_codigo'))->get();

        return view('forms_create/visualizar_anexo', compact('files'));

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
