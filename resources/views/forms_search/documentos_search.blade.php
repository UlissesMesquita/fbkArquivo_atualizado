@extends('layout.cabecalho')
<!DOCTYPE html>
@section('titulo_pagina')
    Pesquisa
@endsection

@section('titulo')
    Pesquisa
@endsection

@section('conteudo')
<div class="container" id="campo-pesquisa">
    

    <form class="form-horizontal" name="form" method="POST" action="{{route('pesquisa_novo')}}" enctype="multipart/form-data">
        @csrf

            <!-- Linha 1 -->
            <div class="row">   

            <div class="col-md-2">
                    <label>Código:</label>
                    <label for="id_codigo"></label><input type="text" class="form-control" id="id_codigo" name="id_codigo" placeholder="codigo">
                </div>
            <div class="col-md-3">
                    <label>Data Início: </label>
                    <label for="data_in"></label><input type="date" class="form-control" id="data_in" name="data_in" placeholder="data_in" >
                @error('data_in')
                    <div class="alert alert-warning">{{ $message }}</div>
                @enderror
                </div>

                <div class="col-md-3">
                    <label>Data Fim: </label>
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
                    <label>Número Documento: </label>
                    <label for="Nome_Doc"></label><input type="text" class="form-control" id="Nome_Doc" name="Nome_Doc" maxlength="12" placeholder="Número Documento" >
                </div>

                <div class="col-md-6">
                    <label for="exampleFormControlTextarea1">Observações:</label>
                    <label for="Loc_Obs"></label><textarea class="form-control" id="Loc_Obs" name="Loc_Obs" rows="3"></textarea>
                </div>

                <div class="col-md-2">
                    <label>Valor:</label>
                    <label for="Valor_Doc"></label><input type="text" class="form-control" id="Valor_Doc" name="Valor_Doc" placeholder="R$">
                </div>

                <div class="col-md-2">
                    <label>Caixa/Etiqueta:</label>
                    <label for="Loc_Box_Eti"></label>
                    <select id="Loc_Box_Eti" name="Loc_Box_Eti" class="form-control" >
                        <option value="">Escolha...</option>
                        <?php
                        for ($i=1; $i<31; $i++) {
                            echo "<option value='".$i."'>". $i ."</option>";
                        }
                        ?>

                    </select>
                </div>

                <div class="col-md-2">
                    <label>Tipo de Projeto:</label>
                    <label for="Tp_Projeto"></label>
                    <select id="Tp_Projeto" name="Tp_Projeto" class="form-control" >
                        <option value="">Escolha...</option>
                        <option>JOB</option>
                        <option>ADM</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Defaz/Destruir: </label>
                    <label for="Desfaz"></label><input type="date" class="form-control" id="Desfaz" name="Desfaz" placeholder="Desfaz">
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
                <form class="form-horizontal" name="form" method="GET" action="{{route('documentos_create')}}">
                    <div class="form-group">
                        <label class="col-md-6 control-label" for="Cadastrar_Novo"></label>
                            <div class="col-md-4" id="Cadastrar_Novo">
                                <button id="Cadastrar_Novo" name="Cadastrar_Novo" class="btn btn-lg btn-primary" type="Submit">Novo Cadastro</button>
                            </div>
                    </div>
                </form>
            <br>
</div>

   <!-- Mostra os dados no banco de dados -->
   <table class="table table-striped">
    <thead>
        <tr id="Cabecalho-tabela">
            <th>Código</th>
            <th>Data Principal</th>
            <th>Emitente</th>
            <th>Destinatária</th>
            <th>Palavra Chave</th>
            <th>Número Documento</th>
            <th>Observações</th>
            <th>Valor</th>
            <th>Caixa/Etiqueta</th>
            <th>Tipo Projeto</th>

            <th>Ferramentas</th>
        </tr>
    </thead>

    <tbody>

        @foreach($dash as $dashboard)
            <tr>
                <td scope="row">{{$dashboard->id_codigo}}</td>
                <td> <a href="documentos_edit/{{$dashboard->id_codigo}}" method="GET">{{date('d/m/Y', strtotime($dashboard->data))}}</a></td>
                <td> {{$dashboard->Emp_Emit}}</td>
                <td> {{$dashboard->Emp_Dest}}</td>
                <td> {{$dashboard->Palavra_Chave}} </td>
                <td> {{$dashboard->Nome_Doc}}</td>
                <td> {{$dashboard->Loc_Obs}} </td>
                <td> R${{$dashboard->Valor_Doc}}</td>
                <td> {{$dashboard->Loc_Box_Eti}}</td>
                <td> {{$dashboard->Tp_Projeto}}</td>
    
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

