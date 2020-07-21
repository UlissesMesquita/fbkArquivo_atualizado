@extends('layout.cabecalho')

@section('titulo_pagina')
    Usuários
@endsection

@section('titulo')
  Gerenciar Usuários
@endsection


@section('conteudo')
<form action="{{route('create-store')}}" method="POST">
  @csrf
<br>
<br>
  <div class="row">

    <div class="col-md-6">
      <label>Login:</label>
      <label for="login"></label><input type="text" class="form-control" id="login" name="login" placeholder="login" required>
    </div>

    <div class="col-md-3">
      <label>Password:</label>
      <label for="password"></label><input type="password" class="form-control" id="#" name="#" placeholder="password" required>
    </div>

    <div class="col-md-3">
      <label>Confirma Password:</label>
      <label for="password"></label><input type="password" class="form-control" id="password" name="password" placeholder="Confirma Password" required>
    </div>

  </div>

<br>
<br>
  <br><button id="cadastrar" name="Cadastrar" class="btn btn-success btn-lg btn-block" type="Submit"> Cadastrar</button><br>
</form>
<br>
<br>
<!--Exibição de dados -->

<h2> Lista de Usuários Cadastrados </h2>
<br>
<!-- Mostra os dados no banco de dados -->
  <table class="table table-striped">
      <thead>
          <tr>
              <th scope="col">ID</th>
              <th scope="col">Login</th>
              <th scope="col">Ação</th>
          </tr>
      </thead>

      {{csrf_field()}}
      
      @foreach($users as $user)
              <tr>
                  <th scope="row">{{$user->id_usuario}}</th>
                  <td>{{$user->login}}</td>



                <!-- Botões de Ação-->
                <td>
                  <span></span>
                  <!-- Botão de Editar -->
                  <a class="far fa-edit" method="GET" href="{{route('usuarios-edit', $user->id_usuario)}}"></a>
                  <!-- Botão de Apagar -->
                  <a class="fas fa-trash"  method="GET" href="{{route('usuarios-delete', $user->id_usuario)}}"></a>
              </td>

              </tr>
        @endforeach

  </table>

@endsection