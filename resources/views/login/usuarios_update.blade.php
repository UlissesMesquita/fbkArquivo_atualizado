@extends('layout.cabecalho')

@section('titulo_pagina')
    Editando Usuários
@endsection

@section('titulo')
    Editando o Usuário: {{$edit->login}}
@endsection

@section('conteudo')
<form action="{{route('usuarios-update', $edit->id_usuario)}}" method="POST">
  @method('PUT')
    @csrf
  <br>
  <br>
    <div class="row">

    <div class="col-md-1">
        <label>ID:</label>
        <label for="ID"></label><input type="text" class="form-control" value="{{$edit->id_usuario}}" id="id_usuario" name="id_usuario" value="{{$edit->id_usuario}}" disabled >
    </div>
  
      <div class="col-md-3">
        <label>Login:</label>
        <label for="login"></label><input type="text" class="form-control" value="{{$edit->login}}" id="login" name="login" placeholder="login" required>
      </div>

      <div class="col-md-2">
        <label>Permissão: *</label>
        <label for="permissao"></label>
            <select id="permissao" name="permissao" class="form-control" required>
                  <option selected>{{$edit->permissao}}</option>
                    <option>Admin</option>
                    <option>Operador</option>
            </select>
        </div>

        <div class="col-md-2">
          <label>Ativo:*</label>
          <label for="permissao"></label>
              <select id="ativo" name="ativo" class="form-control" required>
                    <option selected>{{$edit->ativo}}</option>
                      <option>Ativo</option>
                      <option>Desativado</option>
              </select>
          </div>
  
      <div class="col-md-3">
        <label>Password:</label>
        <label for="password"></label><input type="password" class="form-control"  id="#" name="#" placeholder="password" required>
      </div>
  
      <div class="col-md-3">
        <label>Confirma Password:</label>
        <label for="password"></label><input type="password" class="form-control"  id="password" name="password" placeholder="Confirma Password" required>
      </div>
  
    </div>
  
  <br>
  <br>
    <br><button id="cadastrar" name="Cadastrar" class="btn btn-success btn-lg btn-block" type="Submit"> Alterar</button><br>
  </form>
  <br>
  <br>

@endsection
