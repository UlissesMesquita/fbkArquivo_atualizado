@extends('layout.cabecalho')
<!DOCTYPE html>
@section('titulo_pagina')
    Pesquisa
@endsection

@section('titulo')
    Pesquisa
@endsection

@section('conteudo')
<form class="form-horizontal" name="form" method="POST" action="{{route('pesquisa_novo')}}" enctype="multipart/form-data">
    @csrf

        <!-- Linha 1 -->
        <div class="row">            <div class="col-md-3">
                <label>Data Início: *</label>
                <label for="data_in"></label><input type="date" class="form-control" id="data_in" name="data_in" placeholder="data_in" >
            @error('data_in')
                <div class="alert alert-warning">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-3">
                <label>Data Fim: *</label>
                <label for="data_out"></label><input type="date" class="form-control" id="data_out" name="data_out" placeholder="data_out" >
            @error('data_out')
                <div class="alert alert-warning">{{ $message }}</div>
            @enderror    
            </div>

        </div>
<br>
        <!-- Linha 2 -->
        <div class="row">
            <div class="col-md-3">
                <label>Empresa Emitente: </label>
                <label for="Emp_Emit"></label>
                    <select id="Emp_Emit" name="Emp_Emit" class="form-control" >
                        <option value="">Escolha...</option>
                        
                        @if(isset($emit))
                        @foreach($emit as $emitente)
                            <option value="{{ $emitente->cad_emitentes }}"> {{ $emitente->cad_emitentes }} </option>
                        @endforeach
                        @endif
                    </select>
            </div>

            <div class="col-md-3">
                <label>Empresa Destinatária: </label>
                <label for="Emp_Dest"></label>
                    <select id="Emp_Dest" name="Emp_Dest" class="form-control" value="" >
                        <option value="">Escolha...</option>
                        @if(isset($dest))
                        @foreach($dest as $destinataria)
                            <option value ="{{ $destinataria->cad_destinatarias }}">{{ $destinataria->cad_destinatarias }}</option>
                        @endforeach
                        @endif
                    </select>
            </div>
            

            <div class="col-md-3">
                <label>Palavra-Chave: </label>
                <label for="Palavra_Chave"></label><input type="text" class="form-control" id="Palavra_Chave" name="Palavra_Chave" placeholder="Palavra-Chave" >
            </div>

            <div class="col-md-3">
                <label>Nome Documento: </label>
                <label for="Nome_Doc"></label><input type="text" class="form-control" id="Nome_Doc" name="Nome_Doc" placeholder="Nome_Doc" >
            </div>

            <div class="col-md-6">
                <label for="exampleFormControlTextarea1">Observações:</label>
                <label for="Loc_Obs"></label><textarea class="form-control" id="Loc_Obs" name="Loc_Obs" rows="3"></textarea>
            </div>

            <div class="col-md-2">
                <label>Valor:</label>
                <label for="Valor_Doc"></label><input type="text" class="form-control" id="Valor_Doc" name="Valor_Doc" placeholder="R$">
            </div>
        </div>


        <!-- Botões Pagina-->
            <div class="form-group">
              <label class="col-md-6 control-label" for="Cadastrar"></label>
                <div class="col-md-6" id="botoes_cadastros">
                  <button id="Pesquisar" name="Pesquisar" class="btn btn-lg btn-success" type="Submit"> Pesquisar</button>
                  <button id="Cancelar" name="Cancelar" class="btn btn-lg btn-danger" type="Reset">Limpar</button>
                </div>
            </div>
</form>
            <br>


   <!-- Mostra os dados no banco de dados -->
   <table class="table table-striped">
    <thead>
        <tr id="Cabecalho-tabela">
            <th>Código</th>
            <th>Data Principal</th>
            <th>Emitente</th>
            <th>Destinatária</th>
            <th>Palavra Chave</th>
            <th>Nome Documento</th>
            <th>Observações</th>
            <th>Valor</th>
            <th>Ferramentas</th>
        </tr>
    </thead>

    <tbody>

        @foreach($dash as $dashboard)
            <tr>
                <td scope="row">{{$dashboard->id_codigo}}</td>
                <td> <a href="documentos_edit/{{$dashboard->id_codigo}}" method="GET">{{$dashboard->data}}</a></td>
                <td> {{$dashboard->Emp_Emit}}</td>
                <td> {{$dashboard->Emp_Dest}}</td>
                <td> {{$dashboard->Palavra_Chave}} </td>
                <td> {{$dashboard->Nome_Doc}}</td>
                <td> {{$dashboard->Loc_Obs}} </td>
                <td> R${{$dashboard->Valor_Doc}}</td>
    
                            <!-- Botões de Ação-->
                            <td>

                                <!-- Botão de Exibir PDF -->

                                    <a class="fas fa-file-pdf" href="{{ asset('storage/pdfs/'.$dashboard->id_codigo.'_'. $dashboard->Tit_Doc .'.pdf')}}" target="_blank" method="POST"></a>

                                <!-- Botão de Editar -->
                                
                                    <a class="far fa-edit" href="documentos_edit/{{$dashboard->id_codigo}}" method="GET"></a>
                                
                                <!-- Botão de Apagar -->

                                    <a class="fas fa-trash" href="delete/{{$dashboard->id_codigo}}" method="GET"></a>

                               
                            </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

