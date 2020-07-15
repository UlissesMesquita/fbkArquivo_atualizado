@extends('layout.cabecalho')
<!DOCTYPE html>
@section('titulo_pagina')
    Empresas Emitentes
@endsection

@section('titulo')
    Cadastro de Empresas Emitentes
@endsection


@section('conteudo')
    <form action="{{route('novo_emitente')}}" method="POST">
        {{csrf_field()}}
        <div class=""><br>
            <label>Empresas Emitentes:</label>
            <label for="cad_emitentes"></label><input type="text" class="form-control" id="cad_emitentes" name="cad_emitentes" placeholder="" required>
        </div>

        <br><button id="cadastrar" name="Cadastrar" class="btn btn-success btn-lg btn-block" type="Submit"> Salvar</button><br>
    </form>




    <h2> Lista de Empresas Emitentes Cadadstradas </h2>


    <!-- Dados da Tabela -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Empresas Emitentes</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>

        {{csrf_field()}}

            @foreach($emit as $emitente)
            <tr>
                <th scope="row">{{$emitente->id_empresa_emitente}} </th>
                <td> {{$emitente->cad_emitentes}} </td>
                    <!-- Botões de Ação-->
                    <td>
        
                        <span></span>
                        <!-- Botão de Editar -->
                    <form method="GET" action="{{route('emitente_edit', $emitente->id_empresa_emitente)}}">
                        <input type="hidden" name="edit" value="{{$emitente->id_empresa_emitente}}" required>
                            <button type="submit" class="btn btn-primary">
                                <span class="far fa-edit"></span>
                            </button>
                        </form>

                        <span></span>
                        <!-- Botão de Apagar -->
                        <form method="GET" action="/emitente/delete/{{$emitente->id_empresa_emitente}}">
                                <button type="submit" class="btn btn-danger">
                                <input type="hidden" value="{{$emitente->id_empresa_emitente}}">
                                    <span class="fas fa-trash"></span>
                                </button>
                        </form>

                    </td>
            </tr>
            @endforeach
        </form>
    </table>
@endsection
