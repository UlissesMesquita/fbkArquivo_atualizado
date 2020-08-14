@extends('layout.cabecalho')
<!DOCTYPE html>
@section('titulo_pagina')
    Editando Caixa 
@endsection

@section('titulo')
    Departamento atual: 
@endsection

@section('conteudo')


     <form action="{{route('caixa_update', $caixas->id_caixa)}}" method="POST"> 
        @method('PUT')
        @csrf
        <div class="col-md-12">
            <label><b>Departamento: *</b></label>
            <label for="Dep"></label>
                <select id="Dep" name="Dep" class="form-control" required>
                    @if(isset($caixas))
                            @foreach($caixas as $caixa)
                                <option value="{{$caixa->id_caixa}}">{{$caixa->cad_departamento}}</option>
                            @endforeach
                        @endif                      
                    </select>
                </select>
        </div>

        <br><button id="cadastrar" name="Cadastrar" class="btn btn-success btn-lg btn-block" type="Submit"> Alterar</button><br>
    </form>

@endsection

