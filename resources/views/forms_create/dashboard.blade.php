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
                    <th>Código</th>
                    <th>Data</th>
                    <th>Emitente</th>
                    <th>Destinatária</th>
                    <th>Tipo Documento</th>
                    <th>Nome Documento</th>
                    <th>Valor</th>
                    <th>Data Referência</th>
                    <th>Titulo Documento</th>
                    <th>Palavra Chave</th>
                    <th>Departamento</th>
                    <th>Ação</th>
                </tr>
            </thead>

            <tbody>

                @foreach($dash as $dashboard)
                    <tr>
                        <td scope="row">{{$dashboard->id_codigo}}</td>
                        <td> {{$dashboard->data}} </td>
                        <td> {{$dashboard->Emp_Emit}}</td>
                        <td> {{$dashboard->Emp_Dest}}</td>
                        <td> {{$dashboard->Tp_Doc}}</td>
                        <td> {{$dashboard->Nome_Doc}}</td>
                        <td> R${{$dashboard->Valor_Doc}}</td>
                        <td> {{$dashboard->Dt_Ref}} </td>
                        <td> {{$dashboard->Tit_Doc}} </td>
                        <td> {{$dashboard->Palavra_Chave}} </td>
                        <td> {{$dashboard->Dep}} </td>
            
                            <!-- Botões de Ação-->
                            <td>

                            

                                <!-- Botão de Exibir PDF -->
                                <form method="POST" action="{{ asset('storage/pdfs/'.$dashboard->id_codigo.'_'. $dashboard->Tit_Doc .'.pdf')}}" target="_blank">
                                    <input type="hidden" name="pdf" value="#">
                                    <button type="submit" class="btn btn-success">
                                        <span class="fas fa-file-pdf"></span>
                                    </button>
                                </form>

                                <span></span>

                                <!-- Botão de Editar -->
                                <form method="GET" action="documentos_edit/{{$dashboard->id_codigo}}">
                                    <input type="hidden" value="{{$dashboard->id_codigo}}">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="far fa-edit"></span>
                                    </button>
                                </form>

                                <span></span>
                                <!-- Botão de Apagar -->
                                <form method="GET" action="delete/{{$dashboard->id_codigo}}">
                                        <button type="submit" class="btn btn-danger">
                                            <input type="hidden" value="{{$dashboard->id_codigo}}">
                                            <span class="fas fa-trash"></span>
                                        </button>
                                </form>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
 
    @endsection