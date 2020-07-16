@extends('layout.cabecalho')

@section('titulo_pagina')
Cadastro de Documentos
@endsection


@section('titulo')
Dados do Documento
@endsection

@section('conteudo')


    <form class="form-horizontal" name="form" method="POST" action="{{route('novo_documento')}}" enctype="multipart/form-data">
    @csrf

        <!-- Linha 1 -->
        <div class="row">
        
                <div class="col-md-2">
                    <label>Código: *</label>
        @foreach($dash as $dashboard)
                <label for="id_codigo"></label><input type="text" class="form-control" id="id_codigo" name="id_codigo" placeholder="codigo" value="{{ ($dashboard->id_codigo) + (1) }}"  disabled >
        @endforeach

                </div>

                <div class="col-md-3">
                    <label>Data: *</label>
                    <label for="data"></label><input type="date" class="form-control" id="data" name="data" placeholder="data" required>
                </div>

                <div class="col-md-7">
                    <label>Assunto: *</label>
                    <label for="Assunto"></label><input type="text" class="form-control" id="Assunto" name="Assunto" placeholder="Assunto" required>
                </div>
        </div>

        <!-- Linha 2 -->
        <div class="row">
                <div class="col-md-6">
                    <label>Empresa Emitente: *</label>
                    <label for="Emp_Emit"></label>
                        <select id="Emp_Emit" name="Emp_Emit" class="form-control" required>
                            <option selected>Escolha...</option>
                            
                            @if(isset($emit))
                            @foreach($emit as $emitente)
                                <option value="{{ $emitente->cad_emitentes }}"> {{ $emitente->cad_emitentes }} </option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                <div class="col-md-6">
                    <label>Empresa Destinatária: *</label>
                    <label for="Emp_Dest"></label>
                        <select id="Emp_Dest" name="Emp_Dest" class="form-control" value="" required>
                            <option selected>Escolha...</option>
                            @if(isset($dest))
                            @foreach($dest as $destinataria)
                                <option value ="{{ $destinataria->cad_destinatarias }}">{{ $destinataria->cad_destinatarias }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
            </div>

        <!-- Linha 3 -->
        <div class="row">
            <div class="col-md-4">
                <label>Tipo Documento: *</label>
                <label for="Tp_Doc"></label>
                    <select id="Tp_Doc" name="Tp_Doc" class="form-control" required>
                        <option selected>Escolha...</option>
                        <option>Original</option>
                        <option>Cópia</option>
                    </select>
            </div>

            <div class="col-md-6">
                <label>Nome Documento: *</label>
                <label for="Nome_Doc"></label><input type="text" class="form-control" id="Nome_Doc" name="Nome_Doc" placeholder="Nome_Doc" required>
            </div>

            <div class="col-md-2">
                <label>Valor: *</label>
                <label for="Valor_Doc"></label><input type="text" class="form-control" id="Valor_Doc" name="Valor_Doc" placeholder="R$" required>
            </div>
        </div>

        <!-- Linha 4 -->
        <div class="row">
                <div class="col-md-4">
                    <label>Data Referência: *</label>
                    <label for="Dt_Ref"></label><input type="date" class="form-control" id="Dt_Ref" name="Dt_Ref" placeholder="Dt_Ref" required>
                </div>

                <div class="col-md-8">
                    <label>Título Documento: *</label>
                    <label for="Tit_Doc"></label><input type="text" class="form-control" id="Tit_Doc" name="Tit_Doc" placeholder="Tit_Doc" required>
                </div>
            </div>

        <!-- Linha 5 -->
        <div class="row">
                <div class="col-md-4">
                    <label>Palavra-Chave: *</label>
                    <label for="Palavra_Chave"></label><input type="text" class="form-control" id="Palavra_Chave" name="Palavra_Chave" placeholder="Palavra-Chave" required>
                </div>

                <div class="col-md-8">
                    <label>Descrição: *</label>
                    <label for="Desc"></label><input type="text" class="form-control" id="Desc" name="Desc" placeholder="Desc" required>
                </div>
            </div>

        <!-- Linha 6 -->
        <div class="row">
            <div class="col-md-4">
                <label>Departamento: *</label>
                <label for="Dep"></label>
                    <select id="Dep" name="Dep" class="form-control" required>
                        <option selected>Escolha...</option>
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
                        <option selected>Escolha...</option>
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
                    <option selected>Escolha...</option>
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
                    <option selected>Escolha...</option>
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
                    <option selected>Escolha...</option>
                    <?php
                    for ($i=1; $i<31; $i++) {
                        echo "<option value='".$i."'>". $i ."</option>";
                    }
                    ?>

                </select>
            </div>

            <div class="col-md-2">
                <label>Maço: *</label>
                <label for="Loc_Maço"></label>
                <select id="Loc_Maço" name="Loc_Maco" class="form-control" required>
                    <option selected>Escolha...</option>
                    <?php
                    for ($i=1; $i<4; $i++) {
                        echo "<option value='".$i."'>". $i ."</option>";
                    }
                    ?>

                </select>
            </div>

            <div class="col-md-3">
                <label>Status: *</label>
                <label for="Loc_Status"></label>
                <select id="Loc_Status" name="Loc_Status" class="form-control" required>
                    <option selected>Escolha...</option>
                    <option>Arquivado</option>
                    <option>Não Arquivado</option>
                    <option>Em Processamento</option>
                </select>
            </div>
        </div>

        <!-- Linha 8 -->
        <div class="row">
            <div class="col-md-8">
                <label for="exampleFormControlTextarea1">Observações:</label>
                <label for="Loc_Obs"></label><textarea class="form-control" id="Loc_Obs" name="Loc_Obs" rows="3"></textarea>
            </div>


        <!-- Envio de Arquivos -->
            <div class="arquivo_meio">
                <div class="row">
                    <div class="col-md-16">
                        <div class="input-group mb-10">
                            <div class="custom-file">
                                <input type="hidden" name="enviou" value="1">
                                <input type="file" name="pdf" required="" class="custom-file-input" id="pdf" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="arquivo_campo">Upload..</label>
                            </div>
                        </div>
                    </div>
                </div>
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


