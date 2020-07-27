@extends('layout.cabecalho')
<!DOCTYPE html>
@section('titulo_pagina')
    Departamentos
@endsection

@section('titulo')
    Cadastro de Departamento
@endsection

@section('conteudo')


    <form action="{{route('novo_departamento')}}" method="POST">
        @csrf
        <div class=""><br>
            <label>Departamentos:</label>
            <label for="cad_departamento"></label><input type="text" class="form-control" id="cad_departamento" name="cad_departamento" placeholder="" required>
        </div>

        <br><button id="cadastrar" name="Cadastrar" class="btn btn-success btn-lg btn-block" type="Submit"> Salvar</button><br>
    </form>


    <!--Exibição de dados -->
<h2> Lista de Departamentos Cadastrados </h2>

    <!-- Mostra os dados no banco de dados -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Departamentos</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>

        
        {{csrf_field()}}

            @foreach($departamentos as $departamento)

                <tr>
                    <th scope="row">{{ $departamento->id_departamento }} </th>
                    <td>{{$departamento['cad_departamento']}}</td>

                   <!-- Botões de Ação-->
                    <td>
                        <span></span>
                        <!-- Botão de Editar -->
                        <a class="far fa-edit" href="{{route('departamento_edit', $departamento->id_departamento)}}" method="GET"></a>
                        <!-- Botão de Apagar -->
                        <a class="fas fa-trash" href="/departamento/delete/{{$departamento->id_departamento}}" method="GET"></a>
                    </td>
                </tr>
            @endforeach
    </table>
@endsection


<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript">
 $(function(){
	 var campo = $("#cad_departamento");
	 campo.keyup(function(e){
		 e.preventDefault();
		 campo.val($(this).val().toUpperCase());
	 });
 });
</script>