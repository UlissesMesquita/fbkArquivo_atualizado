@extends('layout.cabecalho')
<!DOCTYPE html>
@section('titulo_pagina')
    Pesquisa
@endsection

@section('titulo')
    Pesquisa
@endsection

@section('conteudo')


<div class="container-fluid" id="campo-pesquisa">


    <form class="form-horizontal" name="form" method="POST" action="{{route('pesquisa_novo')}}" enctype="multipart/form-data">
        @csrf

            <!-- Linha 1 -->
            <div class="row">   

                <div class="col-md-2">
                    <label>Código:</label>
                    <label for="id_codigo"></label><input type="text" class="form-control" id="id_codigo" name="id_codigo" placeholder="">
                </div>
                
                <div class="col-md-2">
                    <label>Data Início: </label>
                    <label for="data_in"></label><input type="date" class="form-control" id="data_in" name="data_in" placeholder="" >
                    @error('data_in')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label>Data Fim: </label>
                    <label for="data_out"></label><input type="date" class="form-control" id="data_out" name="data_out" placeholder="" >
                    @error('data_out')
                        <div class="alert alert-warning">{{ $message }}</div>
                    @enderror    
                </div>

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

            </div>
    <br>
            <!-- Linha 2 -->
            <div class="row"> 
                
                <div class="col-md-2">
                    <label>Tipo de Documento: </label>
                    <label for="tp_documento"></label>
                        <select id="tp_documento" name="tp_documento" class="form-control" onkeyup="maiuscula(this)">
                            <option value="">Escolha...</option>
                                @foreach($tp_documento as $tp_documentos)
                                    <option value="{{$tp_documentos->tp_documento}}">{{$tp_documentos->tp_documento}}</option>
                                @endforeach
                            </select>
                        </select>
                </div>

                <div class="col-md-2">
                    <label>Assunto: </label>
                    <label for="Assunto"></label><input type="text" class="form-control" id="Assunto" name="Assunto" placeholder="" onkeyup="maiuscula(this)">
                </div>

                <div class="col-md-2">
                    <label>Número Documento: </label>
                    <label for="Nome_Doc"></label><input type="text" class="form-control" id="Nome_Doc" name="Nome_Doc" maxlength="12" placeholder="" onkeyup="maiuscula(this)">
                </div>
                
                <div class="col-md-3">
                    <label>Palavra-Chave: </label>
                    <label for="Palavra_Chave"></label><input type="text" class="form-control" id="Palavra_Chave" name="Palavra_Chave" placeholder="" onkeyup="maiuscula(this)">
                </div>

                <div class="col-md-3">
                    <label>Defaz/Destruir: </label>
                    <label for="Desfaz"></label><input type="text" class="form-control" id="Desfaz" name="Desfaz" maxlength="7" placeholder="" onkeyup="maiuscula(this)">
                </div>

            </div>

                <!-- Linha 3 -->
            <div class="row"> 

                <div class="col-md-2">
                    <label>Valor:</label>
                    <label for="Valor_Doc"></label><input type="text" class="form-control" id="Valor_Doc" name="Valor_Doc" placeholder="" onKeyPress="return(moeda(this,'.',',',event))">
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
                
                <div class="col-md-4" id="drop_job" style="display: block">
                    <label>Nome do Projeto: </label>
                    <label for="nome_job"></label>
                    <select id="nome_job" name="nome_job" class="form-control" >
                        <option selected value="">Escolha...</option>
                        @if(isset($job))
                            @foreach($job as $jobs)
                                <option value="{{$jobs->nome_job}}">{{$jobs->nome_job}}</option>
                            @endforeach
                        @endif    
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Assunto:</label>
                    <label for="Assunto"></label><input type="text" class="form-control" id="Assunto" name="Assunto" placeholder="" onkeyup="maiuscula(this)">
                </div>
                

            </div>

            <!-- Linha 3 -->
            <div class="row"> 

                <div class="col-md-2">
                    <label>Local Arquivo: </label>
                    <label for="Loc_Arquivo"></label><input type="text" class="form-control" id="Loc_Arquivo" name="Loc_Arquivo" maxlength="" placeholder="" onkeyup="maiuscula(this)">
                </div>

                <div class="col-md-2">
                    <label>Estante:</label>
                    <label for="Loc_Est"></label>
                    <select id="Loc_Est" name="Loc_Est" class="form-control">
                        <option selected value="">Escolha...</option>
                        <option>Digital</option>
                        <?php
                        for ($i=1; $i<31; $i++) {
                            echo "<option value='".$i."'>". $i ."</option>";
                        }
                        ?>
    
                    </select>
                </div>
    
                <div class="col-md-2">
                    <label>Caixa:</label>
                    <label for="Loc_Box_Eti"></label>
                    <select id="Loc_Box_Eti" name="Loc_Box_Eti" class="form-control">
                        <option selected value="">Escolha...</option>
                        <option>Digital</option>
                        <?php
                        for ($i=1; $i<31; $i++) {
                            echo "<option value='".$i."'>". $i ."</option>";
                        }
                        ?>
    
                    </select>
                </div>
    
                <div class="col-md-2">
                    <label>Maço:</label>
                    <label for="Loc_Maço"></label>
                    <select id="Loc_Maço" name="Loc_Maco" class="form-control">
                        <option selected value="">Escolha...</option>
                        <option>Digital</option>
                        <?php
                        for ($i=1; $i<4; $i++) {
                            echo "<option value='".$i."'>". $i ."</option>";
                        }
                        ?>
    
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="exampleFormControlTextarea1">Observações:</label>
                    <label for="Loc_Obs"></label><textarea class="form-control" id="Loc_Obs" name="Loc_Obs" rows="1" onkeyup="maiuscula(this)"></textarea>
                </div>

            </div>

            <!-- Linha 4 -->
            <div class="row"> 

                <div class="col-md-2" id="drop_job" style="display: block">
                    <label>Criado por: </label>
                    <label for="criado_por"></label>
                    <select id="criado_por" name="criado_por" class="form-control" >
                        <option selected value="">Escolha...</option>
                        @if(isset($criado))
                            @foreach($criado as $create)
                                <option value="{{$create->criado_por}}">{{$create->criado_por}}</option>
                            @endforeach
                        @endif    
                    </select>
                </div>

                <div class="col-md-2" id="drop_job" style="display: block">
                    <label>Editado Por: </label>
                    <label for="editado_por"></label>
                    <select id="editado_por" name="editado_por" class="form-control" >
                        <option selected value="">Escolha...</option>
                        @if(isset($editado))
                            @foreach($editado as $edit)
                                <option value="{{$edit->editado_por}}">{{$edit->editado_por}}</option>
                            @endforeach
                        @endif    
                    </select>
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

            <th scope="col"> Codigo</td>
            <th scope="col">Data Principal</td>
            <th scope="col">Emitente</td>
            <th scope="col">Destinatária</th>    
            <th scope="col">Tipo Documento</td>
            <th scope="col">Número Documento</td>
            <th scope="col">Palavra Chave</td>
            <th scope="col">Tipo projeto</td>
            <th scope="col">Assunto</th>
            <th scope="col">Nome Projeto</td>
            <th scope="col">Local Arquivo</td>
            <th scope="col">Estante</td>
            <th scope="col">Caixa</td>
            <th scope="col">Maço</td>
            <th scope="col">Observações</td>
            <th scope="col">Criado</td>
            <th scope="col">Alterado</td>
            <th scope="col">Valor</td>

            <th scope="col">Ferramentas</th>
        </tr>
    </thead>

    <tbody>

        @foreach($dash as $dashboard)
            <tr>
                    <td scope="row">{{$dashboard->id_codigo}}</td>
                    <td> <a href="documentos_edit/{{$dashboard->id_codigo}}" method="GET">{{$dashboard->data}}</a></td>
                    <th>{{$dashboard->Emp_Emit}}</td>
                    <th>{{$dashboard->Emp_Dest}}</th>    
                    <th>{{$dashboard->tp_documento}}</td>
                    <th>{{$dashboard->Nome_Doc}}</td>
                    <th>{{$dashboard->Palavra_Chave}}</td>
                    <th>{{$dashboard->Tp_Projeto}}</td>
                    <th>{{$dashboard->Assunto}}</th>
                    <th>{{$dashboard->nome_job}}</td>
                    <th>{{$dashboard->Loc_Arquivo}}</td>
                    <th>{{$dashboard->Loc_Est}}</td>
                    <th>{{$dashboard->Loc_Box_Eti}}</td>
                    <th>{{$dashboard->Loc_Maco}}</td>
                    <th>{{$dashboard->Loc_Obs}}</td>
                    <th>{{$dashboard->criado_por}}</td>
                    <th>{{$dashboard->editado_por}}</td>    
                    <th>R${{$dashboard->Valor_Doc}}</td>

                <td>
                    <!-- Botão de Editar -->

                    <a id="delete-icon" class="far fa-edit fa-2x" href="documentos_edit/{{$dashboard->id_codigo}}" method="GET" onclick=""></a>

                    <!-- Botão de Apagar -->

                    <a id="edit-icon" class="fas fa-trash fa-2x" href="delete/{{$dashboard->id_codigo}}" onclick="return confirm('Deseja realmente excluir?')" method="GET"></a>

                    <!-- Botão de Anexo -->
                    <form method="POST" action="{{route('visualizar_anexo')}}" >
                        @csrf 
                            <input type="hidden" name="id_codigo" value="{{$dashboard->id_codigo}}">
                            <button type="submit" class="btn btn-link" target="_blank"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i></button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

