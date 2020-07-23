@extends('layout.cabecalho')

@section('titulo_pagina')
    Editando: {{$edit->Assunto}}
@endsection


@section('titulo')
    Editando: {{$edit->Assunto}}
@endsection

@section('conteudo')


    <form class="form-horizontal" name="form" method="POST" action="{{route('update', $edit->id_codigo)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <!-- Linha 1 -->
        <div class="row">
                <div class="col-md-2">
                    <label>Código: *</label>   <a href="#"><i class="fas fa-search" id="fas fa-search"></i></a>
                <label for="id_codigo"></label><input type="text" class="form-control" id="id_codigo" name="id_codigo" placeholder="codigo" value="{{$edit->id_codigo}}"  disabled >
                </div>

                <div class="col-md-3">
                    <label>Data: *</label>
                <label for="data"></label><input type="date" class="form-control" id="data" name="data" placeholder="data" value="{{$edit->data}}" required>
                </div>

                <div class="col-md-7">
                    <label>Assunto: *</label>
                    <label for="Assunto"></label><input type="text" class="form-control" id="Assunto" name="Assunto" placeholder="Assunto" value="{{$edit->Assunto}}" required>
                </div>
        </div>

        <!-- Linha 2 -->
        <div class="row">


                <div class="col-md-6">
                    <label>Empresa Emitente: *</label>
                    <label for="Emp_Dest"></label>
                        <select id="Emp_Emit" name="Emp_Emit" class="form-control" required>
                            <option selected>{{$edit->Emp_Emit}}</option>
                            @foreach($emit as $emitente)
                                <option value ="{{$emitente->Emp_Emit}}">{{$emitente->Emp_Emit}}</option>
                            @endforeach
                        </select>
                    </div>



                <div class="col-md-6">
                    <label>Empresa Destinatária: *</label>
                    <label for="Emp_Dest"></label>
                        <select id="Emp_Dest" name="Emp_Dest" class="form-control"  required>
                            <option selected>{{$edit->Emp_Dest}}</option>
                            @foreach($dest as $destinataria)
                                <option value ="{{ $destinataria->cad_destinatarias }}">{{ $destinataria->cad_destinatarias }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>

        <!-- Linha 3 -->
        <div class="row">
            <div class="col-md-4">
                <label>Formato do Documento Arquivado: *</label>
                <label for="Formato_Doc"></label>
                    <select id="Formato_Doc" name="Formato_Doc" class="form-control" required>
                        <option>{{$edit->Formato_Doc}}</option>
                        <option>Original Físico</option>
                        <option>Original Digital</option>
                        <option>Cópia</option>
                    </select>
            </div>

            <div class="col-md-6">
                <label>Número Documento: *</label>
                <label for="Nome_Doc"></label><input type="text" class="form-control" id="Nome_Doc" name="Nome_Doc" placeholder="Nome_Doc" value="{{$edit->Nome_Doc}}" required>
            </div>

            <div class="col-md-2">
                <label>Valor: *</label>
                <label for="Valor_Doc"></label><input type="text" class="form-control" id="Valor_Doc" name="Valor_Doc" placeholder="R$" value="{{$edit->Valor_Doc}}">
            </div>
        </div>

        <!-- Linha 4 -->
        <div class="row">
                <div class="col-md-4">
                    <label>Data Referência: *</label>
                    <label for="Dt_Ref"></label><input placeholder= "Mês/Ano" type="text"class="form-control" maxlength="7" name="Dt_Ref" value= "{{$edit->Dt_Ref}}" id="Dt_Ref"/>
                </div>

                <div class="col-md-8">
                    <label>Título Documento: *</label>
                <label for="Tit_Doc"></label><input type="text" class="form-control" id="Tit_Doc" name="Tit_Doc" placeholder="Tit_Doc" value="{{$edit->Tit_Doc}}">
                </div>
            </div>

        <!-- Linha 5 -->
        <div class="row">
                <div class="col-md-4">
                    <label>Palavra-Chave: *</label>
                <label for="Palavra_Chave"></label><input type="text" class="form-control" id="Palavra_Chave" name="Palavra_Chave" placeholder="Palavra-Chave" value="{{$edit->Palavra_Chave}}">
                </div>

                <div class="col-md-8">
                    <label>Descrição: *</label>
                <label for="Desc"></label><input type="text" class="form-control" id="Desc" name="Desc" placeholder="Desc" value="{{$edit->Desc}}" required>
                </div>
            </div>

        <!-- Linha 6 -->
        <div class="row">
            <div class="col-md-4">
                <label>Departamento: *</label>
                <label for="Dep"></label>
                    <select id="Dep" name="Dep" class="form-control" required>
                        <option selected>{{$edit->Dep}}</option>
                        @if(isset($dep))
                            @foreach($dep as $departamento)
                                <option value="{{$departamento->cad_departamento}}">{{$departamento->cad_departamento}}</option>
                            @endforeach
                            @endif
                        </select>
                    </select>
            </div>

            <div class="col-md-4">
                <label>Origem: *</label>
                    <label for="Origem"></label>
                        <select id="Origem" name="Origem" class="form-control" required>
                        <option selected>{{$edit->Origem}}</option>
                        @if(isset($ori))
                            @foreach($ori as $origem)
                                <option value="{{$origem->cad_origem}}">{{$origem->cad_origem}}</option>
                            @endforeach
                        @endif    
                        </select>

                        </select>
                </div>
        </div>

    <h2>Localização</h2>

        <!-- Linha 7 -->
        <div class="row">
            <div class="col-md-2">
                <label>Corredor: *</label>
                <label for="Loc_Cor"></label>
                <select id="Loc_Cor" name="Loc_Cor" class="form-control" required>
                    <option selected>{{$edit->Loc_Cor}}</option>
                    <option>Digital</option>
                    <?php
                    for ($i=1; $i<31; $i++) {
                        echo "<option value='" .$i."'>". $i ."</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-2">
                <label>Estante: *</label>
                <label for="Loc_Est"></label>
                <select id="Loc_Est" name="Loc_Est" class="form-control" required>
                <option selected>{{$edit->Loc_Est}}</option>
                <option>Digital</option>   
                   <?php
                    for ($i=1; $i<31; $i++) {
                        echo "<option value='".$i."'>". $i ."</option>";
                    }
                    ?>

                </select>
            </div>

            <div class="col-md-2">
                <label>Caixa/Etiqueta: *</label>
                <label for="Loc_Box_Eti"></label>
                <select id="Loc_Box_Eti" name="Loc_Box_Eti" class="form-control" required>
                <option selected>{{$edit->Loc_Box_Eti}}</option>
                <option>Digital</option> 
                 <?php
                    for ($i=1; $i<31; $i++) {
                        echo "<option value='".$i."'>". $i ."</option>";
                    }
                    ?>

                </select>
            </div>

            <div class="col-md-2">
                <label>Maço: *</label>
                <label for="Loc_Maco"></label>
                <select id="Loc_Maco" name="Loc_Maco" class="form-control" required>
                <option selected>{{$edit->Loc_Maco}}</option>
                <option>Digital</option>
                <?php
                    for ($i=1; $i<4; $i++) {
                        echo "<option value='".$i."'>". $i ."</option>";
                    }
                    ?>

                </select>
            </div>

            <div class="col-md-2">
                <label>Status: *</label>
                <label for="Loc_Status"></label>
                <select id="Loc_Status" name="Loc_Status" class="form-control" required>
                    
                @switch($edit->Loc_Status)
                    @case($edit->Loc_Status == 'Arquivado')
                        <option selected> Arquivado </option>
                        <option> Em Processamento </option>
                        <option> Não Arquivado </option>
                        @break
                
                    @case($edit->Loc_Status == 'Não Arquivado')
                        <option selected> Não Arquivado </option>
                        <option> Arquivado </option>
                        <option> Em Processamento </option>
                        @break
                
                    @case($edit->Loc_Status == 'Em Processamento')
                        <option selected> Em Processamento </option>
                        <option> Não Arquivado </option>
                        <option> Arquivado </option>
                        @break
                @endswitch
                </select>
            </div>

            <div class="col-md-2">
                <label>Desfaz/Destruir: *</label>
            <label for="Desfaz"></label><input placeholder= "Mês/Ano" type="text" class="form-control" value= "{{$edit->Desfaz}}" name="Desfaz" maxlength="7" id="Desfaz" required/>
            </div>

            <div class="col-md-2">
                <label>Tipo de Projeto:</label>
                <label for="Tp_Projeto"></label>
                <select id="Tp_Projeto" name="Tp_Projeto" class="form-control" >
                    <option>{{$edit->Tp_Projeto}}</option>
                    <option>JOB</option>
                    <option>ADM</option>
                </select>
            </div>
        </div>

        <!-- Linha 8 -->
        <div class="row">
            <div class="col-md-6">
                <label for="exampleFormControlTextarea1">Observações:</label>
            <label for="Loc_Obs"></label><textarea class="form-control" id="Loc_Obs" name="Loc_Obs" rows="1" value="{{$edit->Loc_Obs}}">{{$edit->Loc_Obs}}</textarea>
            </div>


        </div>

        <!-- Botões Pagina-->
            <div class="form-group">
              <label class="col-md-6 control-label" for="Cadastrar"></label>
                <div class="col-md-6" id="botoes_cadastros">
                  <button id="Cadastrar" name="Cadastrar" class="btn btn-lg btn-success" type="Submit"> Salvar</button>
                  <button id="Cancelar" name="Cancelar" class="btn btn-lg btn-danger" type="Reset">Limpar</button>
                </div>
            </div>

    </form>


@endsection


