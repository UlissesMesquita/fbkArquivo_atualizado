<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Origens;

class ControladorOrigem extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response    
     */
    public function index()
    {
        $origem = Origens::all()->sortByDesc('id_origem');
        return view('forms_create/origens', compact('origem'));
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
        $ori = new Origens();
        $ori->cad_origem = $request->input('cad_origem');
        $ori->save();

        if ($ori->save() == TRUE) {
            echo "<div class='alert-success' align='center'> Origens cadastrada com sucesso</div> ";
            return redirect(route('origem_index'));
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
        $edit = Origens::find($id);
        return view('forms_edit/origens_update', compact('edit'));
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
        $ori = new Origens();
        $ori->cad_origem = $request->input('cad_origem');




        Origens::where('id_origem', $id)->update(['cad_origem' => $ori->cad_origem]);
        return redirect(route('origem_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $origen = Origens::find($id);
        $origen->delete();

        return redirect(route('origem_index'));
    }
}
