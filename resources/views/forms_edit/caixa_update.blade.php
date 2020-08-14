@extends('layout.cabecalho')
<!DOCTYPE html>
@section('titulo_pagina')
    Editando Caixa 
@endsection

@section('titulo')
    Departamento atual: 
@endsection

@section('conteudo')
     <form action="{{route('caixa_update', $caixa_edit->id_caixa))}}" method="POST"> 
        @method('PUT')
        @csrf
        <div class="col-md-12">
            <label><b>Departamento: *</b></label>
            <label for="Dep"></label>
                <select id="Dep" name="Dep" class="form-control" required>
                    @if(isset($dep_edit))
                        @if(session()->get('permissao') == 'Admin' || session()->get('departamento') == 'DIRETORIA')
                                @foreach($dep_edit as $departamento)
                                    <option selected value="{{$departamento->id_departamento}}">{{$departamento->cad_departamento}}</option>
                                @endforeach
                            @endif
                                <option value="{{session()->get('departamento')}}">{{session()->get('departamento')}}</option>
                            @endif
                    </select>
                </select>
        </div>

        <br><button id="cadastrar" name="Cadastrar" class="btn btn-success btn-lg btn-block" type="Submit"> Alterar</button><br>
    </form>

@endsection

