@extends('layout.cabecalho')

@section('titulo_pagina')
    Usuários
@endsection

@section('titulo')
  Gerenciar Usuários
@endsection


@section('conteudo')
<form action="" method="POST">
  @csrf
<br>
<br>
  <div class="row">

    <div class="col-md-6">
      <label>Login:</label>
      <label for="Login_Create"></label><input type="text" class="form-control" id="Login_Create" name="Login_Create" placeholder="Login_Create" required>
    </div>

    <div class="col-md-6">
      <label>Password:</label>
      <label for="Password_Create"></label><input type="text" class="form-control" id="Password_Create" name="Password_Create" placeholder="Password_Create" required>
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
      
        
              <tr>
                  <th scope="row"></th>
                  <td></td>



                <!-- Botões de Ação-->
                <td>
                  <span></span>
                  <!-- Botão de Editar -->
                  <a class="far fa-edit" method="GET" href="editar"></a>
                  <!-- Botão de Apagar -->
                  <a class="fas fa-trash"  method="GET" href="apagar"></a>
              </td>

              </tr>
        

  </table>

@endsection