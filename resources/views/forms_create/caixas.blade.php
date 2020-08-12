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

  <div class="col-md-2">
    <label><b>Departamento: *</b></label>
    <label for="Dep"></label>
        <select id="id_departamento" name="id_departamento" class="form-control" required>     
            <option selected>Escolha...</option>
            @if(isset($departamentos))
                {{-- @if(session()->get('permissao') == 'Admin' || session()->get('departamento') == 'DIRETORIA') --}}
                @foreach($departamentos as $departamento)
                    <option value="{{$departamento->id_departamento}}">{{$departamento->cad_departamento}}</option>
                @endforeach
                {{-- @endif --}}
                    {{-- <option selected value="{{session()->get('departamento')}}" >{{session()->get('departamento')}}</option> --}}
                @endif
            </select>
        </select>
</div>



</div>

  <br><button id="cadastrar" name="Cadastrar" class="btn btn-success btn-lg btn-block" type="Submit"> Salvar</button><br>
</form>

<!--Exibição de dados -->



@foreach($departamentos as $departamento )
{{-- @if($departamento == $departamento->cad_departamento) --}}
<h2> {{$departamento->cad_departamento}}</h2>

<!-- Mostra os dados no banco de dados -->
<table class="table table-striped">
  <thead>
      <tr>

          <th scope="col">Nº Caixa</th>
          <th scope="col">Status</th>
          <th scope="col">Departamento</th>
          <th scope="col">Ação</th>

      </tr>
  </thead>

  {{csrf_field()}}

        @php
        $aux = '';
        @endphp
        @foreach($departamentos as $departamento)
        @foreach($departamento->caixa_departamento as $caixa)
        @if ($aux <> $caixa->id_departamento)
        @php
            $aux = $caixa->id_departamento;
            //dd($aux);
            $linha = 1;
        @endphp
        @else
        @php 
            $linha++;
        @endphp
        @endif
        {{-- @if($caixa->status == 'Aberta') --}}

          <tr>
              <th scope="row"> {{$linha }} </th>
              <th scope="row">{{ $caixa->status}}</th>
              <th scope="row">{{ $departamento->cad_departamento}}</th>

             <!-- Botões de Ação-->
              <td>
                  <span></span>
                  @if($caixa->status == 'Aberta')
                  <!-- Botão de Travar Caixa -->
                  <a class="fas fa-lock" href="/caixas/fechar/{{$caixa->id_caixa}}" onclick="return confirm('Deseja realmente fechar a Caixa?')" method="GET"></a>
                  @else
                  <!-- Botão de Destravar Caixa -->
                  <a class="fas fa-unlock" href="/caixas/abrir/{{$caixa->id_caixa}}" onclick="return confirm('Deseja realmente Abrir a Caixa?')" method="GET"></a>
                  @endif
                  <!-- Botão de Editar -->
                  <a class="far fa-edit" href="{{route('departamento_edit', $caixa->id_caixa)}}" method="GET"></a>
                  <!-- Botão de Apagar -->
                  <a class="fas fa-trash" href="/departamento/delete/{{$caixa->id_caixa}}" onclick="return confirm('Deseja realmente excluir?')" method="GET"></a>
              </td>
          </tr>
          {{-- @endif --}}
          @endforeach
      @endforeach
</table>

@endforeach
<br>
<br>



    @endsection