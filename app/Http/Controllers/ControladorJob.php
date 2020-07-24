<?php

namespace App\Http\Controllers;

use App\Cadastro_Documentos;
use App\Job;
use http\Header;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ControladorJob extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index()
    {
        $job = Job::all()->sortByDesc('id_job');
       return view('forms_create/job', compact('job'));


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
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function store(Request $request)
    {
        $job = new Job();
        $job->nome_job = $request->input('nome_job');
        $job->save();

        if ($job->save() == TRUE) {
            echo "<div class='alert-success' align='center'> O Job foi cadastrado com sucesso</div> ";
            return redirect(route('job_index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
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
        $edit = Job::find($id);
        return view('forms_edit/job_update', compact('edit'));
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
        $job = new Job();
        $job->nome_job = $request->input('nome_job');
        Job::where('id_job', $id)->update(['nome_job' => $job->nome_job]);
        return redirect(route('job_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();

        return redirect(route('job_index'));
    }
}
