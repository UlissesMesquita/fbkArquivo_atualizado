@extends('layout.cabecalho')

@section('titulo_pagina')
    Origens
@endsection

@section('titulo')
    Cadastro de Origens
@endsection

@section('conteudo')
    <form action="{{route('novo_origem')}}" method="POST">
        @csrf
        <div class=""><br>
            <label>Origem:</label>
            <label for="cad_origem"></label><input type="text" class="form-control" id="cad_origem" name="cad_origem" placeholder="" required>
        </div>

        <br><button id="cadastrar" name="Cadastrar" class="btn btn-success btn-lg btn-block" type="Submit"> Salvar</button><br>
    </form>



    <!--Exibição de dados -->

    <h2> Lista de Origens Cadadstradas </h2>
    <!-- Mostra os dados no banco de dados -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Origens</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>


        {{csrf_field()}}

        @foreach($origem as $origens)
            <tr>
                <th scope="row">{{ $origens->id_origem }}</th>
                <td> {{ $origens->cad_origem }} </td>

<!-- Botões de Ação-->
                    <td>


                    <span></span>
                    <!-- Botão de Editar -->
                    <form method="GET" action="{{route('origem_edit', $origens->id_origem)}}">
                        <input type="hidden" name="edit" value="{{$origens->id_origem}}" required>
                        <button type="submit" class="btn btn-primary">
                            <span class="far fa-edit"></span>
                        </button>
                    </form>

                    <span></span>
                    <!-- Botão de Apagar -->
                    <form method="GET" action="/origem/delete/{{$origens->id_origem}}">
                            <button type="submit" class="btn btn-danger">
                            <input type="hidden" value="{{$origens->id_origem}}">
                                <span class="fas fa-trash"></span>
                            </button>
                    </form>

                </td>
            </tr>
        @endforeach

    </table>
    </div>

@endsection
