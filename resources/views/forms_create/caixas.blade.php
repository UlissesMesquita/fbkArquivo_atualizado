@extends('layout.cabecalho')

@section('titulo_pagina')
    Gerenciar Caixas
@endsection

@section('titulo')
  Criar Caixas
@endsection


@section('conteudo')
<br>

<form action="{{route('nova_caixa')}}" method="POST">
  @csrf
<div class="row">


  <div class="col-md-3">
    <label><b>Nome da Caixa: *</b></label>
    <label for="nome_caixa"></label><input type="text" class="form-control" id="nome_caixa" name="nome_caixa" maxlength="12" placeholder="" required onkeyup="maiuscula(this)">
  </div>

  <div class="col-md-4">
    <label><b>Departamento: *</b></label>
    <label for="id_departamento"></label>
        <select id="cad_departamento" name="cad_departamento" class="form-control" required>
            <option selected>Escolha...</option>
            @if(isset($departamentos))
                @foreach($departamentos as $departamento)
                    <option value="{{$departamento->cad_departamento}}">{{$departamento->cad_departamento}}</option>
                @endforeach
                @endif
            </select>
        </select>
  </div>


</div>

  <br><button id="cadastrar" name="Cadastrar" class="btn btn-success btn-lg btn-block" type="Submit"> Salvar</button><br>
</form>


<!--Exibição de dados -->
<h2> Caixas Abertas</h2>

<!-- Mostra os dados no banco de dados -->
<table class="table table-striped">
  <thead>
      <tr>
          <th scope="col">#</th>
          <th scope="col">Nome Caixa</th>
          <th scope="col">Departamento</th>
          <th scope="col">Ação</th>
      </tr>
  </thead>

  
  {{csrf_field()}}

      @foreach($caixas as $caixa)

          <tr>
              <th scope="row">{{$caixa->id_caixa}} </th>
              <th scope="row">{{$caixa->nome_caixa}}</th>
              <th scope="row">{{$caixa->departamento_caixa}}</td>


             <!-- Botões de Ação-->
              <td>
                  <span></span>
                  <!-- Botão de Travar Caixa -->
                  <a class="fas fa-lock" href="/caixas/fechar/{{$caixa->id_caixa}}" onclick="return confirm('Deseja realmente fechar a Caixa?')" method="GET"></a>

                  <!-- Botão de Editar -->
                  <a class="far fa-edit" href="{{route('departamento_edit', $caixa->id_caixa)}}" method="GET"></a>
                  <!-- Botão de Apagar -->
                  <a class="fas fa-trash" href="/departamento/delete/{{$caixa->id_caixa}}" onclick="return confirm('Deseja realmente excluir?')" method="GET"></a>
              </td>
          </tr>
      @endforeach
</table>

<br>
<br>

<h2> Caixas Fechadas</h2>
<table class="table table-striped">
  <thead>
      <tr>
          <th scope="col">#</th>
          <th scope="col">Nome Caixa</th>
          <th scope="col">Departamento</th>
          <th scope="col">Ação</th>
      </tr>
  </thead>

  
  {{csrf_field()}}

      @foreach($caixas_fechadas as $caixa)

          <tr>
              <th scope="row">{{$caixa->id_caixa}} </th>
              <th scope="row">{{$caixa->nome_caixa}}</th>
              <th scope="row">{{$caixa->departamento_caixa}}</td>


             <!-- Botões de Ação-->
              <td>
                  <span></span>
                  <!-- Botão de Destravar Caixa -->
              <a class="fas fa-lock-open" href="/caixas/abrir/{{$caixa->id_caixa}}/{{$caixa->departamento}}" onclick="return confirm('Deseja realmente abrir a Caixa?')" method="GET"></a>

                  <!-- Botão de Editar -->
                  <a class="far fa-edit" href="{{route('departamento_edit', $caixa->id_caixa)}}" method="GET"></a>
                  <!-- Botão de Apagar -->
                  <a class="fas fa-trash" href="/departamento/delete/{{$caixa->id_caixa}}" onclick="return confirm('Deseja realmente excluir?')" method="GET"></a>
              </td>
          </tr>
      @endforeach
</table>

@endsection