<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Departamentos;
use App\Caixa_Departamento;

class ControladorCaixasDepartamento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->get('autenticado') == 1) {



            $departamentos = Departamentos::orderBy('cad_departamento', 'ASC')->get();

            
            return view('forms_create.caixas', compact('departamentos'));
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
    {
        if(session()->get('autenticado') == 1) {



            
            $caixa = new Caixa_Departamento();


            $caixa->id_departamento = $request->input('id_departamento');
         
            
            //$fileUpload->id_upload_codigo = $doc->id_codigo;

            $caixa->id_departamento = $caixa->id_departamento;


            $caixa->save();

        return redirect(route('caixas'));
        }
        else {
            return redirect(route('index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            
            //$id_departamento = Caixa_Departamento::where('id_documentos', '=', $id);

            $dep_edit = Departamentos::all();
            //dd($dep_edit);
            
    
            return view('forms_edit/caixa_update', compact('dep_edit'));
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
            $caixa_departamento = new Caixa_Departamento();
            $caixa_departamento->id_departamento = $request->input('Dep');

            Caixa_Departamento::where('id_departamento', $id)->update(['id_departamento' => $caixa_departamento->id_departamento]);
            return redirect(route('caixas'));
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
       
    }

     public function fecharCaixa($id_caixa) {
        // dd($id_caixa);
        if(session()->get('autenticado') == 1) {
             Caixa_Departamento::where('id_caixa', $id_caixa)->update(['status' => 'Fechada']);
             return redirect(route('caixas'));
        }
        else {
             return redirect(route('index'));
         }
     }

     public function abrirCaixa($id_caixa) {
         if(session()->get('autenticado') == 1) {
            //  $caixa_aberta = Caixa_Departamento::where('status', '=', 'Aberta')->get();
            //  //dd($caixa_aberta->count());

            //  if ($caixa_aberta->count() >= 1) {
            //      echo "Feche a caixa que está aberta para poder abrir outra caixa";
            //      return redirect(route('caixas'));
            //  }
            //  else {
                 Caixa_Departamento::where('id_caixa', $id_caixa)->update(['status' => 'Aberta']);
                 return redirect(route('caixas'));
            //  }
          }
         else {
             return redirect(route('index'));
         }
          
     }

}


