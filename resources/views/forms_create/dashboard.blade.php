    @extends('layout.cabecalho')

    @section('titulo_pagina')
        Dashboard
    @endsection

    @section('titulo')
        Dashboard
    @endsection


@section('conteudo')

        <table class="table table-striped">
            <thead>
                <tr>
                    <th> Codigo</td>
                        <th>Data Principal</td>
                        <th>Emitente</td>
                        <th>Destinatária</th>    
                        <th>Tipo Documento</td>
                        <th>Número Documento</td>
                        <th>Palavra Chave</td>
                        <th>Tipo projeto</td>
                        <th>Nome Projeto</td>
                        <th>Local Arquivo</td>
                        <th>Estante</td>
                        <th>Caixa</td>
                        <th>Maço</td>
                        <th>Observações</td>
                        <th>Valor</td>
                            
                        <th>Ferramentas</th>
                </tr>
            </thead>


            <tbody>

                @foreach($dash as $dashboard)
                    <tr>
                        <td scope="row">{{$dashboard->id_codigo}}</td>
                        <td> <a href="documentos_edit/{{$dashboard->id_codigo}}" method="GET">{{$dashboard->data}}</a></td>
                        <th>{{$dashboard->Emp_Emit}}Emitente</td>
                        <th>{{$dashboard->Emp_Dest}}Destinatária</th>    
                        <th>{{$dashboard->tp_documento}}Tipo Documento</td>
                        <th>{{$dashboard->Nome_Doc}}Número Documento</td>
                        <th>{{$dashboard->Palavra_Chave}}Palavra Chave</td>
                        <th>{{$dashboard->Tp_Projeto}}Tipo projeto</td>
                        <th>{{$dashboard->nome_job}}Nome Projeto</td>
                        <th>{{$dashboard->Loc_Arquivo}}Local Arquivo</td>
                        <th>{{$dashboard->Loc_Est}}Estante</td>
                        <th>{{$dashboard->Loc_Box_Eti}}Caixa</td>
                        <th>{{$dashboard->Loc_Maco}}Maço</td>
                        <th>{{$dashboard->Loc_Obs}}Observações</td>
                        <th>R${{$dashboard->Valor_Doc}}Valor</td>
                        <td>

                            <!-- Botão de Editar -->

                            <a class="far fa-edit" href="documentos_edit/{{$dashboard->id_codigo}}" method="GET"></a>
        
                            <!-- Botão de Apagar -->

                            <a class="fas fa-trash" href="delete/{{$dashboard->id_codigo}}" onclick="return confirm('Deseja realmente excluir?')" method="GET"></a>

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

                           
</td>

