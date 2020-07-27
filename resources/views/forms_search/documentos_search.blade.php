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
                    <label for="id_codigo"></label><input type="text" class="form-control" id="id_codigo" name="id_codigo" placeholder="">
                </div>
            <div class="col-md-3">
                    <label>Data Início: </label>
                    <label for="data_in"></label><input type="date" class="form-control" id="data_in" name="data_in" placeholder="" >
                @error('data_in')
                    <div class="alert alert-warning">{{ $message }}</div>
                @enderror
                </div>

                <div class="col-md-3">
                    <label>Data Fim: </label>
                    <label for="data_out"></label><input type="date" class="form-control" id="data_out" name="data_out" placeholder="" >
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
                            @foreach($emit as $emitente)
                                <option value="{{ $emitente->cad_emitentes }}"> {{ $emitente->cad_emitentes }} </option>
                            @endforeach
                        </select>
                </div>

                <div class="col-md-3">
                    <label>Empresa Destinatária: </label>
                    <label for="Emp_Dest"></label>
                        <select id="Emp_Dest" name="Emp_Dest" class="form-control" value="" >
                            <option value="">Escolha...</option>
                            @foreach($dest as $destinataria)
                                <option value ="{{ $destinataria->cad_destinatarias }}">{{ $destinataria->cad_destinatarias }}</option>
                            @endforeach
                        </select>
                </div>
                

                <div class="col-md-3">
                    <label>Palavra-Chave: </label>
                    <label for="Palavra_Chave"></label><input type="text" class="form-control" id="Palavra_Chave" name="Palavra_Chave" placeholder="" onkeyup="maiuscula(this)">
                </div>

                <div class="col-md-3">
                    <label>Número Documento: </label>
                    <label for="Nome_Doc"></label><input type="text" class="form-control" id="Nome_Doc" name="Nome_Doc" maxlength="12" placeholder="" onkeyup="maiuscula(this)">
                </div>

                <div class="col-md-3">
                    <label>Local Arquivo: </label>
                    <label for="Loc_Arquivo"></label><input type="text" class="form-control" id="Loc_Arquivo" name="Loc_Arquivo" maxlength="" placeholder="" onkeyup="maiuscula(this)">
                </div>

                <div class="col-md-6">
                    <label for="exampleFormControlTextarea1">Observações:</label>
                    <label for="Loc_Obs"></label><textarea class="form-control" id="Loc_Obs" name="Loc_Obs" rows="1" onkeyup="maiuscula(this)"></textarea>
                </div>

                <div class="col-md-2">
                    <label>Valor:</label>
                    <label for="Valor_Doc"></label><input type="text" class="form-control" id="Valor_Doc" name="Valor_Doc" placeholder="" onKeyPress="return(moeda(this,'.',',',event))">
                </div>

                <div class="col-md-2">
                    <label>Caixa/Etiqueta:</label>
                    <label for="Loc_Box_Eti"></label>
                    <select id="Loc_Box_Eti" name="Loc_Box_Eti" class="form-control" >
                        <option value="">Escolha...</option>
                        <option>Digital</option>
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
                    <label>Tipo de Documento: *</label>
                    <label for="tp_documento"></label>
                        <select id="tp_documento" name="tp_documento" class="form-control" required onkeyup="maiuscula(this)">
                            <option selected>Escolha...</option>
                            @if(isset($tp_documento))
                                @foreach($tp_documento as $tp_documentos)
                                    <option value="{{$tp_documento->tp_documento}}">{{$tp_documento->tp_documento}}</option>
                                @endforeach
                                @endif
                            </select>
                        </select>
                </div>

                <div class="col-md-4">
                    <label>Defaz/Destruir: </label>
                    <label for="Desfaz"></label><input type="texr" class="form-control" id="Desfaz" name="Desfaz" maxlength="7" placeholder="" onkeyup="maiuscula(this)">
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
                <td> <a href="documentos_edit/{{$dashboard->id_codigo}}" method="GET">{{$dashboard->data}}</a></td>
                <td> {{$dashboard->Emp_Emit}}</td>
                <td> {{$dashboard->Emp_Dest}}</td>
                <td> {{$dashboard->Palavra_Chave}} </td>
                <td> {{$dashboard->Nome_Doc}}</td>
                <td> {{$dashboard->Loc_Obs}} </td>
                <td> R${{$dashboard->Valor_Doc}}</td>
                <td> {{$dashboard->Loc_Box_Eti}}</td>
                <td> {{$dashboard->Tp_Projeto}}</td>
                
                
                <td>

                    <!-- Botão de Editar -->

                    <a class="far fa-edit" href="documentos_edit/{{$dashboard->id_codigo}}" method="GET"></a>

                    <!-- Botão de Apagar -->

                    <a class="fas fa-trash" href="delete/{{$dashboard->id_codigo}}" method="GET"></a>

                    <!-- Botão de Anexo -->
                    <form method="POST" action="{{route('visualizar_anexo')}}" >
                        @csrf
                            <input type="hidden" name="id_codigo" value="{{$dashboard->id_codigo}}">
                            <input type="submit" class="fas fa-file-pdf" target="_blank" value="Anexos">
                    </form>


                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

