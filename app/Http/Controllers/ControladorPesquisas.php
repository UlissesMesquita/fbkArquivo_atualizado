<?php

namespace App\Http\Controllers;

use App\Cadastro_Documentos;
use App\Empresas_Destinatarias;
use App\Empresas_Emitentes;
use App\Departamentos;
use App\Pesquisas;
use App\Job;
use App\TipoDocumento;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class ControladorPesquisas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(session()->get('autenticado') == 1) {
            $emit = Empresas_Emitentes::all();
            $dep = Departamentos::all();
            $dest = Empresas_Destinatarias::all();
            $dash = Cadastro_Documentos::all()->sortByDesc('id_codigo');
            $tp_documento = TipoDocumento::all();
            $job = Job::all();
            $criado = Cadastro_Documentos::orderBy('criado_por', 'ASC')->distinct()->whereNotNull('criado_por')->get('criado_por'); 
            $editado = Cadastro_Documentos::orderBy('editado_por','ASC')->distinct()->whereNotNull('editado_por')->get('editado_por');
        

            return view('forms_search/documentos_search', compact('tp_documento','emit', 'dest', 'dash', 'job', 'criado', 'editado', 'dep'));
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
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Pesquisas  $pesquisas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        if(session()->get('autenticado') == 1) {
            // Vetificar se tem data_in e data_out 
            if (isset($request['data_in']) && isset($request['data_out'])) {
                if( empty($request->input('data_in')) && !empty($request->input('data_out')))
                    return redirect()->back()->withErrors([
                        'data_in' => 'Sem data inicial'
                    ])->withInput();

                    if( empty($request->input('data_out')) && ! empty($request->input('data_in')))
                    return redirect()->back()->withErrors([
                        'data_out' => 'Sem data final'
                    ])->withInput();
                    $data_in =  $request->input('data_in');
                    $data_out = $request->input('data_out');

            }   //


            $dados = $this->arrayParse($request);
            // $dadosData = $this->arrayParseDate($request);
            
                //dd($dados);
                if(isset($data_in) && isset($data_out)){
                    $dash = empty($dados) ? Cadastro_Documentos::whereBetween('data', [$data_in, $data_out])->get(): 
                                    Cadastro_Documentos::where($dados)->whereBetween('data', [$data_in, $data_out])->get() ;
                }elseif (isset($dados) ) {
                    $dash = Cadastro_Documentos::where($dados)->get();
                }
                else {
                    $dash = Cadastro_Documentos::all();
                }
                $emit = Empresas_Emitentes::orderBy('cad_emitentes', 'ASC')->get();
                $dest = Empresas_Destinatarias::orderBy('cad_destinatarias', 'ASC')->get();
                $dep = Departamentos::orderBy('cad_departamento', 'ASC')->get();
                $tp_documento = TipoDocumento::orderBy('tp_documento', 'ASC')->get();
                $job = Job::orderBy('nome_job', 'ASC')->get();
                $contador = Cadastro_Documentos::where($dados)->whereNotNull('id_codigo')->count();
                
                if ($contador == null ) {
                    $contador = 0;
                    return view('forms_search/documentos_search', compact('tp_documento', 'dest', 'emit', 'dash', 'job','contador', 'dep'));
                }
                else {

                    return view('forms_search/documentos_search', compact('tp_documento', 'dest', 'emit', 'dash', 'job', 'contador', 'dep'));
                }

                
        }
        else {
            return redirect(route('index'));
        }

    
        
    }
    
    public function getPdf(Request $request)
    {
        if(session()->get('autenticado') == 1) {
            if (isset($request['id_codigo']) && !empty($request->input('id_codigo')) )
            {
                $cad_doc = Cadastro_documentos::where('id_codigo', '=', $request->input('id_codigo'))->first();
                if($cad_doc)
                {
                    $file_name = $cad_doc->id_codigo .'_'. $cad_doc->Tit_Doc .'.pdf';
                    $header =  [
                        'Content-Type' => 'application/pdf',
                        'Content-Disposition' => 'inline; filename="'.$file_name.'"'
                    ];
                    // dd(asset('storage/pdfs'));
                    $path = storage_path('anexo/'.$cad_doc->id_codigo.'_'. $cad_doc->Tit_Doc .'.pdf');
                    if(!file_exists($path))
                    {
                        return '<h1>Arquivo não encontrado</h1>';
                    }
                    return response()->file($path, $header);
                }
            }
        }
        else {
            return redirect(route('index'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pesquisas  $pesquisas
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesquisas $pesquisas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pesquisas  $pesquisas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesquisas $pesquisas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pesquisas  $pesquisas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesquisas $pesquisas)
    {
        //
    }


    //Funções Helpers
    private function arrayParse(Request $request) {
        
    
        
        foreach($request->toArray() as $key => $valor) {
            if ($valor <> NULL && $valor <> '' && $key <> '_token' && $key <> 'data_in' && $key <> 'data_out') {
                $dados[] = [DB::raw('UPPER('.$key.')'), 'LIKE', '%'. strtoupper($valor). '%'];
            }


        }
            return isset($dados)? $dados:[];
    }





}
