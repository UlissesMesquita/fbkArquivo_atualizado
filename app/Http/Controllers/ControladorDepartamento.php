<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamentos;
use Illuminate\Http\Response;

class ControladorDepartamento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){

        $departamentos = Departamentos::all()->sortByDesc('id_departamento');
        return view('forms_create.departamentos', compact('departamentos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $dep = new Departamentos();
        $dep->cad_departamento = $request->input('cad_departamento');
        $dep->save();

        if ($dep->save() == TRUE) {
            echo "<div class='alert-success' align='center'> Departamentos cadastrado com sucesso</div> ";
            return redirect(route('departamento_index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        
        $dep_edit = Departamentos::find($id);
        return view('forms_edit/departamentos_update', compact('dep_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $dep = new Departamentos();
        $dep->cad_departamento = $request->input('cad_departamento');

        Departamentos::where('id_departamento', $id)->update(['cad_departamento' => $dep->cad_departamento]);
        return redirect(route('departamento_index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $departament = Departamentos::find($id);
        $departament->delete();
        return redirect(route('departamento_index'));
    }
}
